<?php

namespace App\Http;

use App\Actions\Fortify\CreateNewUser;
use App\Mail\PasswordResetLink;
use App\Models\InviteCode;
use App\Models\PasswordResetRequest;
use App\Models\Setting;
use App\Services\PlayerExports\PlayerExportService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

use function App\Helpers\add_characters;
use function App\Helpers\get_client_ip_address;
use function App\Helpers\is_incorrect_production_url;
use function App\Helpers\passwd_compat_hasher;
use function App\Helpers\player_is_online;

class PlayerController extends Controller
{
    protected bool $debugPlayerExports = false; // If we want to display the generated SQL on the page, set this to true.

    public function bd_nice_number($n): string
    {
        if ($n > 1000000000000) {
            return round(($n / 1000000000000), 1).' trillion';
        } elseif ($n > 1000000000) {
            return round(($n / 1000000000), 1).' billion';
        } elseif ($n > 1000000) {
            return round(($n / 1000000), 1).' million';
        } elseif ($n > 1000) {
            return round(($n / 1000), 1).' thousand';
        }

        return number_format($n);
    }

    public function rank($db, $subpage, $skill): int
    {
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }

            return DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select(DB::raw('count(a.playerid)'))
                ->where(DB::raw($this->cast('a', $skill)), '>', function ($query) use ($subpage, $skill) {
                    $query->from('experience as a')
                        ->join('players as b', 'a.playerID', '=', 'b.id')
                        ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                        ->select(DB::raw($this->cast('a', $skill)))
                        ->where('b.username', '=', $subpage);
                })
                ->whereNotIn('b.banned', [-1, 1])
                ->where('b.group_id', '>=', 8)
                ->where('c.iron_man', '!=', 4)
                ->count()
                +
                DB::connection($conn)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->join('ironman as c', 'b.id', '=', 'c.playerID')
                    ->select(DB::raw('count(a.playerid)'))
                    ->where(DB::raw('aa.'.$skill), '<', function ($query) use ($subpage, $skill) {
                        $query->from('experience as a')
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw('aa.'.$skill))
                            ->where('b.username', '=', $subpage);
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where('b.group_id', '>=', 8)
                    ->where('c.iron_man', '!=', 4)
                    ->count();
        } else {
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }

            return DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select(DB::raw('count(a.playerid)'))
                ->where(DB::raw($this->coalesce('a', 'aa', $skill)), '>', function ($query) use ($subpage, $skill) {
                    $query->from('experience as a')
                        ->join('players as b', 'a.playerID', '=', 'b.id')
                        ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                        ->select(DB::raw($this->coalesce('a', 'aa', $skill)))
                        ->where('b.username', '=', $subpage)
                        ->limit(1); // This limit 1 shouldn't be necessary, but without it, we get errors when there are multiple rows for the same username somehow.
                })
                ->whereNotIn('b.banned', [-1, 1])
                ->where('b.group_id', '>=', 8)
                ->count()
                +
                DB::connection($conn)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select(DB::raw('count(a.playerid)'))
                    ->where(DB::raw('aa.'.$skill), '<', function ($query) use ($subpage, $skill) {
                        $query->from('experience as a')
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw('aa.'.$skill))
                            ->where('b.username', '=', $subpage)
                            ->limit(1); // This limit 1 shouldn't be necessary, but without it, we get errors when there are multiple rows for the same username somehow.
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where('b.group_id', '>=', 8)
                    ->count();
        }
    }

    public function coalesce($alias1, $alias2, $subpage, $relabel = false): string
    {
        if (! $relabel) {
            return 'ifnull('.$this->maxCast($alias2, $subpage).','.$this->cast($alias1, $subpage).')';
        } else {
            return 'ifnull('.$this->maxCast($alias2, $subpage).','.$this->cast($alias1, $subpage).') as '.$subpage;
        }
    }

    public function cast($alias, $subpage, $relabel = false): string
    {
        if (! $relabel) {
            return $alias.'.'.$subpage.'&0xFFFFFFFF';
        } else {
            return '('.$alias.'.'.$subpage.'&0xFFFFFFFF) as '.$subpage;
        }
    }

    public function maxCast($alias, $subpage, $relabel = false): string
    {
        if (! $relabel) {
            return $alias.'.'.$subpage.'|0xFFFFFFFF';
        } else {
            return '('.$alias.'.'.$subpage.'|0xFFFFFFFF) as '.$subpage;
        }
    }

    public function skill_cast($alias, $skill_array): array
    {
        return array_map(function ($skill) use ($alias) {
            return DB::raw($this->cast($alias, $skill, true));
        }, $skill_array);
    }

    public function skill_coalesce($alias1, $alias2, $skill_array): array
    {
        return array_map(function ($skill) use ($alias1, $alias2) {
            return DB::raw($this->coalesce($alias1, $alias2, $skill, true));
        }, $skill_array);
    }

    public function cast_skills($alias, $skill_array): string
    {
        return implode('+', array_map(function ($skill) use ($alias) {
            return '('.$this->cast($alias, $skill).')';
        }, $skill_array));
    }

    public function coalesce_skills($alias1, $alias2, $skill_array): string
    {
        return implode('+', array_map(function ($skill) use ($alias1, $alias2) {
            return '('.$this->coalesce($alias1, $alias2, $skill).')';
        }, $skill_array));
    }

    public function index($db, $subpage): \Illuminate\Contracts\View\View|Factory|Application
    {
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $skill_array = ['hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting'];
        } elseif (value($db) == '2001scape') { // retro authentic -- omitted unimplemented skills or that could not be leveled by its own
            $skill_array = ['hits', 'ranged', 'prayGood', 'prayEvil', 'goodMagic', 'evilMagic', 'cooking', 'woodcutting', 'firemaking', 'crafting', 'smithing', 'mining'];
        } else { // modern authentic
            $skill_array = ['hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving'];
        }

        /**
         * @var $players
         * Fetches the table row of the player experience in view and paginates the results
         */
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense']);
            $players = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw('
			        (SUM(('.$this->cast_skills('a', $query_skills).')) / 4.0) as total_xp
                '), ...$this->skill_cast('a', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                    ['c.iron_man', '!=', 4],
                ])
                ->get();
        } elseif (value($db) == '2001scape') { // retro authentic
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense', 'influence', 'thieving', 'tailoring', 'herblaw']);
            $players = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			        (SUM(('.$this->coalesce_skills('a', 'aa', $query_skills).')) /4.0) as total_xp
			    '), ...$this->skill_coalesce('a', 'aa', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        } else { // modern authentic
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense']);
            $players = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			        (SUM(('.$this->coalesce_skills('a', 'aa', $query_skills).')) /4.0) as total_xp
                '), ...$this->skill_coalesce('a', 'aa', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        }

        if (! $players) {
            abort(404);
        }

        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense']);
            $rank_overall = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerid', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select(DB::raw('COUNT(*) as rank'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['c.iron_man', '!=', '4'],
                ])
                ->where(function ($query) use ($subpage, $query_skills) {
                    $query->whereRaw('b.skill_total > (SELECT skill_total FROM players WHERE username = ? LIMIT 1)', [$subpage])
                        ->orWhereRaw('(b.skill_total = (SELECT skill_total FROM players WHERE username = ? LIMIT 1)
                            AND (SELECT SUM('.$this->cast_skills('a', $query_skills).') / 4.0
                            FROM experience a WHERE a.playerid = b.id)
                            >
                            (SELECT SUM('.$this->cast_skills('a', $query_skills).') / 4.0
                            FROM experience a JOIN players b ON a.playerid = b.id
                            WHERE b.username = ? LIMIT 1)
                        )', [$subpage, $subpage]);
                })
                ->get();
        } elseif (value($db) == '2001scape') { // Retro authentic
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense', 'influence', 'thieving', 'tailoring', 'herblaw']);
            $rank_overall = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerid', '=', 'b.id')
                ->select(DB::raw('COUNT(*) as rank'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                ])
                ->where(function ($query) use ($subpage, $query_skills) {
                    $query->whereRaw('b.skill_total > (SELECT skill_total FROM players WHERE username = ? LIMIT 1)', [$subpage])
                        ->orWhereRaw('(b.skill_total = (SELECT skill_total FROM players WHERE username = ? LIMIT 1)
                            AND (SELECT SUM('.$this->coalesce_skills('a', 'aa', $query_skills).') / 4.0
                            FROM experience a
                            JOIN capped_experience as aa ON aa.playerID = b.id
                            WHERE a.playerid = b.id)
                            >
                            (SELECT SUM('.$this->coalesce_skills('a', 'aa', $query_skills).') / 4.0
                            FROM experience a JOIN players b ON a.playerid = b.id
                            JOIN capped_experience as aa ON aa.playerID = b.id
                            WHERE b.username = ? LIMIT 1)
                        )', [$subpage, $subpage]);
                })
                ->get();
        } else { // authentic
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $query_skills = array_merge($skill_array, ['attack', 'strength', 'defense']);
            $rank_overall = DB::connection($conn)
                ->table('experience as a')
                ->join('players as b', 'a.playerid', '=', 'b.id')
                ->select(DB::raw('COUNT(*) as rank'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                ])
                ->where(function ($query) use ($subpage, $query_skills) {
                    $query->whereRaw('b.skill_total > (SELECT skill_total FROM players WHERE username = ? LIMIT 1)', [$subpage])
                        ->orWhereRaw('(b.skill_total = (SELECT skill_total FROM players WHERE username = ? LIMIT 1)
                            AND (SELECT SUM('.$this->coalesce_skills('a', 'aa', $query_skills).') / 4.0
                            FROM experience a
                            JOIN capped_experience as aa ON aa.playerID = b.id
                            WHERE a.playerid = b.id)
                            >
                            (SELECT SUM('.$this->coalesce_skills('a', 'aa', $query_skills).') / 4.0
                            FROM experience a JOIN players b ON a.playerid = b.id
                            JOIN capped_experience as aa ON aa.playerID = b.id
                            WHERE b.username = ? LIMIT 1)
                        )', [$subpage, $subpage]);
                })
                ->get();
        }
        $hiscores = [];
        if ($db === 'openpk') {
            $conn = $db;
            if (config('openrsc.caching_databases')) {
                $conn = $db.'_caching';
            }
            $hiscores = DB::connection($conn)
                ->table('players as b')
                ->select('b.*')
                ->groupBy('b.username')
                ->orderBy('b.kills', 'desc')
                ->orderBy('b.deaths', 'asc')
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['b.kills', '>', '0'],
                ])
                ->paginate(21);
        }

        return view('player', [
            'subpage' => $subpage,
            'players' => $players,
            'rank_overall' => $rank_overall,
            'skill_array' => $skill_array,
            'db' => $db,
            'hiscores' => $hiscores,
        ])
            ->with(compact('players'));
    }

    /**
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sharbank($db, Request $request)
    {
        $conn = $db;
        if (config('openrsc.caching_databases')) {
            $conn = $db.'_caching';
        }
        /**
         * @var $bankitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $bankitems = DB::connection($conn)
            ->table('bank as a')
            ->join('itemstatuses as c', 'a.itemID', '=', 'c.itemID')
            ->join('itemdef as d', 'c.catalogID', '=', 'd.id')
            ->join('players as b', function ($join) {
                $join->on('a.playerID', '=', 'b.id')
                    ->where([
                        ['b.username', '=', 'shar'],
                    ]);
            })
            ->select('*', DB::raw('b.username, a.playerID, format(c.amount, 0) as number, a.slot, d.name as itemName'))
            ->orderBy('a.slot', 'asc')
            ->get();

        if ($bankitems->isEmpty()) {
            abort(404);
        }

        return view('bank', [
            'bankitems' => $bankitems,
            'db' => $db,
        ])
            ->with(compact('bankitems'));
    }

    /**
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sharinv($db, Request $request)
    {
        $conn = $db;
        if (config('openrsc.caching_databases')) {
            $conn = $db.'_caching';
        }
        /**
         * @var $invitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection($conn)
            ->table('invitems as a')
            ->join('itemstatuses as c', 'a.itemID', '=', 'c.itemID')
            ->join('itemdef as d', 'c.catalogID', '=', 'd.id')
            ->join('players as b', function ($join) {
                $join->on('a.playerID', '=', 'b.id')
                    ->where([
                        ['b.username', '=', 'shar'],
                    ]);
            })
            ->select('*', DB::raw('b.username, a.playerID, format(c.amount, 0) as number, a.slot, d.name as itemName'))
            ->orderBy('a.slot', 'asc')
            ->get();

        if ($invitems->isEmpty()) {
            abort(404);
        }

        return view('invitem', [
            'invitems' => $invitems,
            'db' => $db,
        ])
            ->with(compact('invitems'));
    }

    /**
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function bank($db, $subpage, Request $request)
    {
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'bank_items',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'] ?? '',
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /**
         * @var $bankitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $bankitems = DB::connection($db)
            ->table('bank as a')
            ->join('itemstatuses as c', 'a.itemID', '=', 'c.itemID')
            ->join('itemdef as d', 'c.catalogID', '=', 'd.id')
            ->join('players as b', function ($join) use ($subpage) {
                $join->on('a.playerID', '=', 'b.id')
                    ->where([
                        ['b.username', '=', $subpage],
                    ]);
            })
            ->select('*', DB::raw('b.username, a.playerID, format(c.amount, 0) as number, a.slot, d.name as itemName'))
            ->orderBy('a.slot', 'asc')
            ->get();

        if ($bankitems->isEmpty()) {
            abort(404);
        }

        return view('bank', [
            'subpage' => $subpage,
            'bankitems' => $bankitems,
            'db' => $db,
        ])
            ->with(compact('bankitems'));
    }

    /**
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function invitem($db, $subpage, Request $request)
    {
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'inv_items',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'] ?? '',
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /**
         * @var $invitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection($db)
            ->table('invitems as a')
            ->join('itemstatuses as c', 'a.itemID', '=', 'c.itemID')
            ->join('itemdef as d', 'c.catalogID', '=', 'd.id')
            ->join('players as b', function ($join) use ($subpage) {
                $join->on('a.playerID', '=', 'b.id')
                    ->where([
                        ['b.username', '=', $subpage],
                    ]);
            })
            ->select('*', DB::raw('b.username, a.playerID, format(c.amount, 0) as number, a.slot, d.name as itemName'))
            ->orderBy('a.slot', 'asc')
            ->get();

        if ($invitems->isEmpty()) {
            abort(404);
        }

        return view('invitem', [
            'subpage' => $subpage,
            'invitems' => $invitems,
            'db' => $db,
        ])
            ->with(compact('invitems'));
    }

    public function exportView(Request $request): View
    {
        if (! config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && ! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && ! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        $data = false;
        if ($this->debugPlayerExports) {
            $data = $request->input('data') ?? '';
        }

        return view('playerexportform', [
            'success' => '',
            'data' => $data,
        ]);
    }

    public function exportInstructions(Request $request): View
    {
        if (! config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && ! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && ! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('playerexportinstructions', []);
    }

    public function exportSubmit(Request $request)
    {
        if (! config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && ! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && ! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        try {
            $validated = $request->validate([
                'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
                'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20'],
            ]);
        } catch (ValidationException $e) {
            return redirect(route('PlayerExportView'))->withErrors('Validation failed');
        }

        $db = $request->input('db');
        $username = $request->input('username');
        $password = add_characters($request->input('password'), 20);
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));

        $user = DB::connection($db)
            ->table('players')
            ->select('*')
            ->where('username', $trimmed_username)
            ->first();

        if ($user === null) {
            return redirect(route('PlayerExportView'))->withErrors('Invalid credentials');
        }
        if (player_is_online($db, $trimmed_username)) {
            return redirect(route('PlayerExportView'))->withErrors('You must be logged out to create a player export');
        }
        // If we have a salt, we're using some form of legacy password, so let's generate a sha512 hash.
        if ($user->salt) {
            $trimmed_pass = passwd_compat_hasher(trim($password), $user->salt);
        } else {
            $trimmed_pass = trim($password);
        }
        // If we're still using SHA512 for the password, do a simple comparison.
        if ($this->passwordNeedsRehash($user->pass)) {
            if ($trimmed_pass !== $user->pass) {
                return redirect(route('PlayerExportView'))->withErrors('Invalid credentials');
            }
        } elseif (! Hash::check($trimmed_pass, $user->pass)) { // Otherwise, we have a bcrypt hash in the DB to check.
            return redirect(route('PlayerExportView'))->withErrors('Invalid credentials');
        }
        $data = '';
        $playerExportService = new PlayerExportService($trimmed_username, $db);
        $data = $playerExportService->execute();

        if ($this->debugPlayerExports) {
            return view('playerexportform', [
                'success' => true,
                'data' => $data,
            ]);
        }
        $success = '';
        if ($data) {
            $success = 'Player export generated successfully.';
            try {
                return Response::make($playerExportService->generateFile(), 200, $playerExportService->generateAttachmentHeaders());
            } catch (\Exception $e) {
                \Log::error("Could not generate player export for username $trimmed_username DB $db at ".$playerExportService->getDateString().' with error: '.$e->getMessage());

                return redirect(route('PlayerExportView'))->withErrors('Could not generate export, please try again later.');
            }
        }

        return view('playerexportform', [
            'success' => $success,
        ]);
    }

    /**
     * This method exports user's characters via an API endpoint.
     *
     * @return Application|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|null
     */
    public function exportSubmitApi(Request $request)
    {
        // Only enable API when public use is allowed and when the API itself is enabled.
        if (! config('openrsc.player_exports_enabled') || ! config('openrsc.player_exports_api_enabled') || config('openrsc.player_exports_admin_only') || config('openrsc.player_exports_moderator_only')) {
            abort(404);
        }

        try {
            $validated = $request->validate([
                'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
                'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20'],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->validator->errors(),
            ], 422);
        }

        $db = $request->input('db');
        $username = $request->input('username');
        $password = add_characters($request->input('password'), 20);
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));

        $user = DB::connection($db)
            ->table('players')
            ->select('*')
            ->where('username', $trimmed_username)
            ->first();

        if ($user === null) {
            return Response::json('Invalid credentials', 401);
        }
        if (player_is_online($db, $trimmed_username)) {
            return Response::json('You must be logged out to create a player export', 401);
        }
        // If we have a salt, we're using some form of legacy password, so let's generate a sha512 hash.
        if ($user->salt) {
            $trimmed_pass = passwd_compat_hasher(trim($password), $user->salt);
        } else {
            $trimmed_pass = trim($password);
        }
        // If we're still using SHA512 for the password, do a simple comparison.
        if ($this->passwordNeedsRehash($user->pass)) {
            if ($trimmed_pass !== $user->pass) {
                return Response::json('Invalid credentials', 401);
            }
        } elseif (! Hash::check($trimmed_pass, $user->pass)) { // Otherwise, we have a bcrypt hash in the DB to check.
            return Response::json('Invalid credentials', 401);
        }
        $data = '';
        $playerExportService = new PlayerExportService($trimmed_username, $db);
        $data = $playerExportService->execute();

        if ($data) {
            $success = 'Player export generated successfully.';
            try {
                return Response::make($playerExportService->generateFile(), 200, $playerExportService->generateAttachmentHeaders());
            } catch (\Exception $e) {
                \Log::error("Could not generate player export for username $trimmed_username DB $db at ".$playerExportService->getDateString().' with error: '.$e->getMessage());

                return redirect(route('PlayerExportView'))->withErrors('Could not generate export, please try again later.');
            }
        }

        return Response::json('Could not generate player export', 401);
    }

    /**
     * This method creates user's new characters via an API endpoint.
     * Some duplicated validation here is necessary for JSON
     * error messages, since it is technically handled at a
     * higher up level outside Fortify, since we have our own
     * custom API handled right here.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUserApi(Request $request)
    {
        if (! config('openrsc.api_registration_enabled') || is_incorrect_production_url()) {
            abort(404);
        }

        $inviteOnly = (Setting::where('key', 'invite_only_registration')->value('value') === '1') ?? false;
        $rules = [
            'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
            'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20', 'confirmed'],
        ];
        $inviteCode = '';
        if ($inviteOnly) {
            $rules['invite_code'] = ['required', 'exists:invite_codes,code,used,false'];
            $inviteCode = InviteCode::where('code', $request->input('invite_code') ?? '')->first();
        }

        $domain = parse_url(config('app.url'), PHP_URL_HOST); //For example: rsc.vet
        try {
            $validated = $request->validate($rules);
            if (!empty($input['email']) && str_ends_with(strtolower($input['email']), '@' . strtolower($domain))) {
                throw ValidationException::withMessages([
                    'email' => ['Registration using this email domain is not allowed.'],
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->validator->errors(),
            ], 422);
        }

        $db = $request->input('db');
        $username = $request->input('username');
        $password = add_characters($request->input('password'), 20);
        $password_confirmation = add_characters($request->input('password_confirmation'), 20);
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));

        // Check if the user already exists
        if (DB::connection($db)->table('players')->where(DB::raw('LOWER(username)'), '=', strtolower($trimmed_username))->exists()) {
            return response()->json(['message' => 'The username is already in use.'], 409); // Conflict status code
        }

        // Check if the username has already been badnamed
        $formerBadNameExists = DB::connection($db)->table('former_names')
            ->where(DB::raw('LOWER(formerName)'), '=', strtolower($trimmed_username))
            ->where('changeType', '=', 1)
            ->exists();

        if ($formerBadNameExists) {
            return response()->json([
                'message' => 'This username cannot be used',
            ], 422);
        }

        // Check if the user already has too many accounts
        $recentAccounts = DB::connection($db)->table('players')
            ->where('creation_ip', '=', get_client_ip_address())
            ->where('creation_date', '>=', time() - 86400)
            ->count();

        if ($recentAccounts >= config('openrsc.max_new_accounts_per_24_hours_'.$db)) {
            return response()->json([
                'message' => 'You have created too many accounts in the past 24 hours.',
                'status' => 429,
            ], 429);
        }

        // Create the user using Fortify's logic
        try {
            $new_user_action = new CreateNewUser;
            $user = $new_user_action->create([
                'db' => $db,
                'name' => $username,
                'username' => $username,
                'email' => $request->input('email') ?? '',
                'password' => $password,
                'password_confirmation' => $password_confirmation,
                'invite_code' => $request->input('invite_code') ?? '',
            ]);
            if ($inviteOnly && $inviteCode) {
                $inviteCode->used = true;
                $inviteCode->save();
            }

        } catch (\Exception $e) {
            \Log::info("There was an error with API registration for $username: ".$e->getMessage());

            return response()->json(['message' => 'Error creating user.'], 500);
        }

        return response()->json(['message' => "Your account '$trimmed_username' has been created!"], 201);
    }

    public function passwordNeedsRehash($passwordHashed)
    {
        return ! str_starts_with($passwordHashed, '$2y$10$');
    }

    public function showMessageCenter(Request $request)
    {
        if (! config('openrsc.message_center_enabled')) {
            return redirect('home');
        }
        if (Auth::user() !== null && strtolower(Auth::user()->username) === strtolower(session('expected_username')) && $request->attributes->get('dynamic_guard_middleware_ran') &&
            $request->attributes->get('dynamic_guard_checker_middleware_ran')) {

            $showAppealMessage = config('openrsc.message_center_appeal_message_enabled');

            $user = Auth::user();
            $expectedUsername = session('expected_username');
            $dbConnection = session('db_connection');
            $playerId = $user->id;
            $currentTimeMillis = time() * 1000; // Current time in milliseconds

            // Fetch regular mute status
            $muteExpires = DB::connection($dbConnection)
                ->table('player_cache')
                ->where('playerID', $playerId)
                ->where('key', 'mute_expires')
                ->where('type', 3)
                ->value('value');

            if ($muteExpires === null) {
                $mutedStatus = 'No';
            } elseif ((int) $muteExpires === -1) {
                $mutedStatus = 'Permanently';
            } elseif ((int) $muteExpires > 0 && $currentTimeMillis < (int) $muteExpires) {
                $mutedStatus = Carbon::createFromTimestamp($muteExpires / 1000)->format('Y-m-d H:i:s T');
            } else {
                $mutedStatus = 'No';
            }

            // Fetch global mute status
            $globalMute = DB::connection($dbConnection)
                ->table('player_cache')
                ->where('playerID', $playerId)
                ->where('key', 'global_mute')
                ->where('type', 3)
                ->value('value');

            if ($globalMute === null) {
                $globalMutedStatus = 'No';
            } elseif ((int) $globalMute === -1) {
                $globalMutedStatus = 'Permanently';
            } elseif ((int) $globalMute > 0 && $currentTimeMillis < (int) $globalMute) {
                $globalMutedStatus = Carbon::createFromTimestamp($globalMute / 1000)->format('Y-m-d H:i:s T');
            } else {
                $globalMutedStatus = 'No';
            }

            // The mute column only updates on game logout, not when issued.
            if ((int) $user->muted === -1) {
                $mutedColumnStatus = 'Permanently';
            } elseif ((int) $user->muted > 0 && $currentTimeMillis < (int) $user->muted) {
                $mutedColumnStatus = Carbon::createFromTimestamp($user->muted / 1000)->format('Y-m-d H:i:s T');
            } else {
                $mutedColumnStatus = 'No';
            }

            // Banned column updates immediately when issued.
            if ((int) $user->banned === -1) {
                $bannedStatus = 'Permanently';
            } elseif ((int) $user->banned > 0 && $currentTimeMillis < (int) $user->banned) {
                $bannedStatus = Carbon::createFromTimestamp($user->banned / 1000)->format('Y-m-d H:i:s T');
            } else {
                $bannedStatus = 'No';
            }

            return view('message-center', [
                'loggedIn' => true,
                'user' => $user,
                'expectedUsername' => $expectedUsername,
                'dbConnection' => $dbConnection,
                'mutedStatus' => $mutedStatus,
                'globalMutedStatus' => $globalMutedStatus,
                'mutedColumnStatus' => $mutedColumnStatus,
                'muteExpires' => $muteExpires,
                'globalMute' => $globalMute,
                'mutedColumn' => $user->muted,
                'banned' => $user->banned,
                'bannedStatus' => $bannedStatus,
                'currentTimeMillis' => $currentTimeMillis,
                'showAppealMessage' => $showAppealMessage,
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function showPasswordResetPage(Request $request) {
        if (!config('openrsc.password_resets_enabled', false)) {
            abort(404);
        }

        if (is_incorrect_production_url()) {
            \Log::warning('IP '.get_client_ip_address().' tried to reset password with incorrect website URL in production! URL: ' . $request->fullUrl());
            abort(404);
        }

        return view('auth.password-request');
    }

    public function sendResetLink(Request $request)
    {
        if (!config('openrsc.password_resets_enabled', false)) {
            abort(404);
        }

        if (is_incorrect_production_url()) {
            \Log::warning('IP '.get_client_ip_address().' tried to reset password with incorrect website URL in production! URL: ' . $request->fullUrl());
            abort(404);
        }

        $multiWorldLoginsEnabled = config('openrsc.multi_world_logins', false);

        $allowedWorlds = $multiWorldLoginsEnabled
        ? ['preservation', 'cabbage', 'uranium', 'coleslaw', '2001scape']
        : ['preservation'];

        $request->validate([
            'username' => ['required', 'string'],
            'email' => ['required', 'email'],
            'db' => ['required', Rule::in($allowedWorlds)],
        ]);

        $db = $request->input('db');
        $email = $request->input('email');
        $username = trim(preg_replace('/[-_.]/', ' ', $request->input('username')));

        $email = DB::connection($db)->table('players')
            ->where(DB::raw('LOWER(username)'), '=', strtolower($username))
            ->where(DB::raw('LOWER(email)'), '=', strtolower($email))
            ->value('email');

        $statusMessage = 'If the email you provided matches the one on record, an email with a code will be sent shortly.';
        //If the email is incorrect, DO NOT TELL THE USER! We can simply redirect them back with a default status message, using the same status message for a correct email too.
        if (!$email) {
            \Log::info("Password Reset incorrect email {$email} provided for username {$username} from IP: " . get_client_ip_address() . " on world {$db}, reset email will not be sent.");
            return back()->with('status', $statusMessage);
        }

        $token = Str::uuid();

        PasswordResetRequest::updateOrCreate(
            ['username' => $username, 'db' => $db],
            ['email' => $email, 'token' => $token, 'expires_at' => now()->addHour(), 'ip' => get_client_ip_address()],
        );

        $resetUrl = route('password.reset.form', ['token' => $token]);
        Mail::to($email)->send(new PasswordResetLink($resetUrl, $token, $username, $db));
        \Log::info("Password Reset correct email {$email} provided for username {$username} from IP: " . get_client_ip_address() . " on world: {$db}, sending reset email.");
        return back()->with('status', $statusMessage);
    }

    public function showPasswordResetForm(Request $request, $token)
    {
        if (!config('openrsc.password_resets_enabled', false)) {
            abort(404);
        }

        if (is_incorrect_production_url()) {
            \Log::warning('IP '.get_client_ip_address().' tried to reset password with incorrect website URL in production! URL: ' . $request->fullUrl());
            abort(404);
        }

        $resetRequest = PasswordResetRequest::where('token', $token)
            ->where('expires_at', '>=', now())
            ->firstOrFail();

        return view('auth.password-reset', [
            'username' => $resetRequest->username,
            'db' => $resetRequest->db,
            'token' => $token,
        ]);
    }

    public function handlePasswordReset(Request $request)
    {
        if (!config('openrsc.password_resets_enabled', false)) {
            abort(404);
        }

        if (is_incorrect_production_url()) {
            \Log::warning('IP '.get_client_ip_address().' tried to reset password with incorrect website URL in production! URL: ' . $request->fullUrl());
            abort(404);
        }

        $request->validate([
            'token' => 'required|uuid',
            'password' => ['required', 'confirmed', 'min:4', 'max:20', 'regex:/^([ -~])+$/i'],
        ]);

        $resetRequest = PasswordResetRequest::where('token', $request->token)
            ->where('expires_at', '>=', now())
            ->firstOrFail();

        //Players can only reset their password if their IP address matches the IP address that requested the password reset.
        if (get_client_ip_address() !== $resetRequest->ip) {
            abort(404);
        }

        $trimmedUsername = trim(preg_replace('/[-_.]/', ' ', $resetRequest->username));

        DB::connection($resetRequest->db)->table('players')
            ->where(DB::raw('LOWER(username)'), '=', strtolower($trimmedUsername))
            ->update([
                'pass' => Hash::make(trim(add_characters($request->password, 20))),
                'salt' => '' //Clear out their existing compatibility salt if any, since bcrypt has salt built-in we don't need another salt.
            ]);

        //Log the password change then delete it.
        \Log::info("Password Reset completed for email {$resetRequest->email} with username {$resetRequest->username} from IP: " . get_client_ip_address() . " on world: {$resetRequest->db}, password has been changed.");
        //Let the user know their password was changed, this is really important!
        Mail::to($resetRequest->email)->send(
            new \App\Mail\PasswordResetSuccess($resetRequest->username, $resetRequest->db)
        );
        //Delete the password request, since we don't need it anymore.
        $resetRequest->delete();
        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }
}
