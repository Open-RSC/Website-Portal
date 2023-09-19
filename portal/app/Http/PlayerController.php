<?php

namespace App\Http;

use App\Actions\Fortify\CreateNewUser;
use function App\Helpers\add_characters;
use function App\Helpers\get_client_ip_address;
use function App\Helpers\is_incorrect_production_url;
use function App\Helpers\passwd_compat_hasher;
use function App\Helpers\player_is_online;
use App\Services\PlayerExports\PlayerExportService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PlayerController extends Controller
{
    protected bool $debugPlayerExports = false; //If we want to display the generated SQL on the page, set this to true.

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
            return DB::connection($db)
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
                DB::connection($db)
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
            return DB::connection($db)
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
                            ->limit(1); //This limit 1 shouldn't be necessary, but without it, we get errors when there are multiple rows for the same username somehow.
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where('b.group_id', '>=', 8)
                    ->count()
                +
                DB::connection($db)
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
                            ->limit(1); //This limit 1 shouldn't be necessary, but without it, we get errors when there are multiple rows for the same username somehow.
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
            $players = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw('
			(SUM(('.$this->cast('a', 'attack').') +
			('.$this->cast('a', 'strength').') +
			('.$this->cast('a', 'defense').') +
			('.$this->cast('a', 'hits').') +
			('.$this->cast('a', 'ranged').') +
			('.$this->cast('a', 'prayer').') +
			('.$this->cast('a', 'magic').') +
			('.$this->cast('a', 'cooking').') +
			('.$this->cast('a', 'woodcut').') +
			('.$this->cast('a', 'fletching').') +
			('.$this->cast('a', 'fishing').') +
			('.$this->cast('a', 'firemaking').') +
			('.$this->cast('a', 'crafting').') +
			('.$this->cast('a', 'smithing').') +
			('.$this->cast('a', 'mining').') +
			('.$this->cast('a', 'herblaw').') +
			('.$this->cast('a', 'agility').') +
			('.$this->cast('a', 'thieving').') +
			('.$this->cast('a', 'runecraft').') +
			('.$this->cast('a', 'harvesting').'))
			/4.0)
			as total_xp
			'), ...$this->skill_cast('a', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        } elseif (value($db) == '2001scape') { // retro authentic
            $players = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			(SUM(('.$this->coalesce('a', 'aa', 'attack').') +
			('.$this->coalesce('a', 'aa', 'strength').') +
			('.$this->coalesce('a', 'aa', 'defense').') +
			('.$this->coalesce('a', 'aa', 'hits').') +
			('.$this->coalesce('a', 'aa', 'ranged').') +
			('.$this->coalesce('a', 'aa', 'prayGood').') +
			('.$this->coalesce('a', 'aa', 'prayEvil').') +
			('.$this->coalesce('a', 'aa', 'goodMagic').') +
			('.$this->coalesce('a', 'aa', 'evilMagic').') +
			('.$this->coalesce('a', 'aa', 'cooking').') +
			('.$this->coalesce('a', 'aa', 'woodcutting').') +
			('.$this->coalesce('a', 'aa', 'firemaking').') +
			('.$this->coalesce('a', 'aa', 'crafting').') +
			('.$this->coalesce('a', 'aa', 'smithing').') +
			('.$this->coalesce('a', 'aa', 'mining').') +
			('.$this->coalesce('a', 'aa', 'influence').') +
			('.$this->coalesce('a', 'aa', 'thieving').') +
			('.$this->coalesce('a', 'aa', 'tailoring').') +
			('.$this->coalesce('a', 'aa', 'herblaw').'))
			/4.0)
			as total_xp
			'), ...$this->skill_coalesce('a', 'aa', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        } else { // modern authentic
            $players = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			(SUM(('.$this->coalesce('a', 'aa', 'attack').') +
			('.$this->coalesce('a', 'aa', 'strength').') +
			('.$this->coalesce('a', 'aa', 'defense').') +
			('.$this->coalesce('a', 'aa', 'hits').') +
			('.$this->coalesce('a', 'aa', 'ranged').') +
			('.$this->coalesce('a', 'aa', 'prayer').') +
			('.$this->coalesce('a', 'aa', 'magic').') +
			('.$this->coalesce('a', 'aa', 'cooking').') +
			('.$this->coalesce('a', 'aa', 'woodcut').') +
			('.$this->coalesce('a', 'aa', 'fletching').') +
			('.$this->coalesce('a', 'aa', 'fishing').') +
			('.$this->coalesce('a', 'aa', 'firemaking').') +
			('.$this->coalesce('a', 'aa', 'crafting').') +
			('.$this->coalesce('a', 'aa', 'smithing').') +
			('.$this->coalesce('a', 'aa', 'mining').') +
			('.$this->coalesce('a', 'aa', 'herblaw').') +
			('.$this->coalesce('a', 'aa', 'agility').') +
			('.$this->coalesce('a', 'aa', 'thieving').'))
			/4.0)
			as total_xp
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
            $rank_overall = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', function ($join) {
                    $join->on('a.playerid', '=', 'b.id');
                })
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select(DB::raw('COUNT(b.skill_total) as rank'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['c.iron_man', '!=', '4'],
                    ['b.skill_total', '>', function ($query) use ($subpage) {
                        $query
                            ->select(DB::raw('b.skill_total'))
                            ->from('players AS b')
                            ->orderBy('b.skill_total', 'desc')
                            ->whereNotIn('b.banned', [-1, 1])
                            ->where([
                                ['b.group_id', '>=', '8'],
                                ['b.username', '=', $subpage],
                                ['c.iron_man', '!=', '4'],
                            ])
                            ->limit(1); //This limit 1 shouldn't be necessary, but without it, we get errors when there are multiple rows for the same username somehow.
                    }],
                ])
                ->get();
        } else { // authentic
            $rank_overall = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', function ($join) {
                    $join->on('a.playerid', '=', 'b.id');
                })
                ->select(DB::raw('COUNT(b.skill_total) as rank'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['b.skill_total', '>', function ($query) use ($subpage) {
                        $query
                            ->select(DB::raw('b.skill_total'))
                            ->from('players AS b')
                            ->orderBy('b.skill_total', 'desc')
                            ->whereNotIn('b.banned', [-1, 1])
                            ->where([
                                ['b.group_id', '>=', '8'],
                                ['b.username', '=', $subpage],
                            ])
                            ->limit(1); //This limit 1 shouldn't be necessary, but without it, we get errors randomly.
                    }],
                ])
                ->get();
        }
        $hiscores = [];
        if ($db === 'openpk') {
            $hiscores = DB::connection($db)
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
        /**
         * @var $bankitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $bankitems = DB::connection($db)
            ->table('bank as a')
            ->join('itemstatuses as c', 'a.itemID', '=', 'c.itemID')
            ->join('itemdef as d', 'c.catalogID', '=', 'd.id')
            ->join('players as b', function ($join) {
                $join->on('a.playerID', '=', 'b.id')
                    ->where([
                        ['b.username', '=', 'shar']
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
        /**
         * @var $invitems
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection($db)
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
        if (!Gate::allows('admin', Auth::user())) {
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
        if (!Gate::allows('admin', Auth::user())) {
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
            $validated = $this->validate($request, [
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
        //If we have a salt, we're using some form of legacy password, so let's generate a sha512 hash.
        if ($user->salt) {
            $trimmed_pass = passwd_compat_hasher(trim($password), $user->salt);
        } else {
            $trimmed_pass = trim($password);
        }
        //If we're still using SHA512 for the password, do a simple comparison.
        if ($this->passwordNeedsRehash($user->pass)) {
            if ($trimmed_pass !== $user->pass) {
                return redirect(route('PlayerExportView'))->withErrors('Invalid credentials');
            }
        } elseif (! Hash::check($trimmed_pass, $user->pass)) { //Otherwise, we have a bcrypt hash in the DB to check.
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
     * @param Request $request
     * @return Application|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|null
     */
    public function exportSubmitApi(Request $request)
    {
        //Only enable API when public use is allowed and when the API itself is enabled.
        if (! config('openrsc.player_exports_enabled') || ! config('openrsc.player_exports_api_enabled') || config('openrsc.player_exports_admin_only') || config('openrsc.player_exports_moderator_only')) {
            abort(404);
        }

        try {
            $validated = $this->validate($request, [
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
        //If we have a salt, we're using some form of legacy password, so let's generate a sha512 hash.
        if ($user->salt) {
            $trimmed_pass = passwd_compat_hasher(trim($password), $user->salt);
        } else {
            $trimmed_pass = trim($password);
        }
        //If we're still using SHA512 for the password, do a simple comparison.
        if ($this->passwordNeedsRehash($user->pass)) {
            if ($trimmed_pass !== $user->pass) {
                return Response::json('Invalid credentials', 401);
            }
        } elseif (! Hash::check($trimmed_pass, $user->pass)) { //Otherwise, we have a bcrypt hash in the DB to check.
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUserApi(Request $request)
    {
        if (!config('openrsc.api_registration_enabled') || is_incorrect_production_url()) {
            abort(404);
        }

        try {
            $validated = $this->validate($request, [
                'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20', 'confirmed'],
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
        $password_confirmation = add_characters($request->input('password_confirmation'), 20);
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));

        // Check if the user already exists
        if (DB::connection($db)->table('players')->where(DB::raw('LOWER(username)'), '=', strtolower($trimmed_username))->exists()) {
            return response()->json(['message' => 'The username is already in use.'], 409); // Conflict status code
        }

        // Check if the user already has too many accounts
        $recentAccounts = DB::connection($db)->table('players')
        ->where('creation_ip', '=', get_client_ip_address())
        ->where('creation_date', '>=', time() - 86400)
        ->count();

        if ($recentAccounts >= config('openrsc.max_new_accounts_per_24_hours')) {
            return response()->json([
                'message' => 'You have created too many accounts in the past 24 hours.',
                'status' => 429
            ], 429);
        }

        // Create the user using Fortify's logic
        try {
            $new_user_action = new CreateNewUser();
            $user = $new_user_action->create([
                'db' => $db,
                'name' => $username,
                'username' => $username,
                'email' => $request->input('email') ?? "",
                'password' => $password,
                'password_confirmation' => $password_confirmation,
            ]);
        } catch (\Exception $e) {
            \Log::info("There was an error with API registration for $username: " . $e->getMessage());
            return response()->json(['message' => 'Error creating user.'], 500);
        }

        return response()->json(['message' => "Your account '$trimmed_username' has been created!"], 200);
    }

    public function passwordNeedsRehash($passwordHashed)
    {
        return ! str_starts_with($passwordHashed, '$2y$10$');
    }
}
