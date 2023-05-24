<?php

namespace App\Http;

use App\Models\players;
use App\Services\PlayerExports\PlayerExportService;
use App\Services\Stats\StatsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;

use function App\Helpers\passwd_compat_hasher;
use function App\Helpers\add_characters;
use function App\Helpers\player_is_online;

class PlayerController extends Controller
{
    
    protected bool $debugPlayerExports = false; //If we want to display the generated SQL on the page, set this to true.
    
    /**
     * @param $n
     * @return string
     */
    public function bd_nice_number($n): string
    {
        if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
        else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
        else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
        else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';
        return number_format($n);
    }

    /**
     * @param $db
     * @param $subpage
     * @param $skill
     * @return int
     */
    public function rank($db, $subpage, $skill): int
    {
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            return DB::connection($db)
                    ->table("experience as a")
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->join('ironman as c', 'b.id', '=', 'c.playerID')
                    ->select(DB::raw("count(a.playerid)"))
                    ->where(DB::raw($this->cast('a', $skill)), ">", function ($query) use ($db, $subpage, $skill) {
                        $query->from("experience as a")
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw($this->cast('a', $skill)))
                            ->where("b.username", "=", $subpage);
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where("b.group_id", ">=", 8)
                    ->where("c.iron_man", "!=", 4)
                    ->count()
                +
                DB::connection($db)
                    ->table("experience as a")
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->join('ironman as c', 'b.id', '=', 'c.playerID')
                    ->select(DB::raw("count(a.playerid)"))
                    ->where(DB::raw('aa.' . $skill), "<", function ($query) use ($db, $subpage, $skill) {
                        $query->from("experience as a")
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw('aa.' . $skill))
                            ->where("b.username", "=", $subpage);
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where("b.group_id", ">=", 8)
                    ->where("c.iron_man", "!=", 4)
                    ->count();
        } else {
            return DB::connection($db)
                    ->table("experience as a")
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select(DB::raw("count(a.playerid)"))
                    ->where(DB::raw($this->coalesce('a', 'aa', $skill)), ">", function ($query) use ($db, $subpage, $skill) {
                        $query->from("experience as a")
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw($this->coalesce('a', 'aa', $skill)))
                            ->where("b.username", "=", $subpage);
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where("b.group_id", ">=", 8)
                    ->count()
                +
                DB::connection($db)
                    ->table("experience as a")
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select(DB::raw("count(a.playerid)"))
                    ->where(DB::raw('aa.' . $skill), "<", function ($query) use ($db, $subpage, $skill) {
                        $query->from("experience as a")
                            ->join('players as b', 'a.playerID', '=', 'b.id')
                            ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                            ->select(DB::raw('aa.' . $skill))
                            ->where("b.username", "=", $subpage);
                    })
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where("b.group_id", ">=", 8)
                    ->count();
        }
    }

    public function coalesce($alias1, $alias2, $subpage, $relabel = false): string
    {
        if (!$relabel) {
            return 'ifnull(' . $this->maxCast($alias2, $subpage) . ',' . $this->cast($alias1, $subpage) . ')';
        } else {
            return 'ifnull(' . $this->maxCast($alias2, $subpage) . ',' . $this->cast($alias1, $subpage) . ') as ' . $subpage;
        }
    }

    public function cast($alias, $subpage, $relabel = false): string
    {
        if (!$relabel) {
            return $alias . '.' . $subpage . '&0xFFFFFFFF';
        } else {
            return '(' . $alias . '.' . $subpage . '&0xFFFFFFFF) as ' . $subpage;
        }
    }

    public function maxCast($alias, $subpage, $relabel = false): string
    {
        if (!$relabel) {
            return $alias . '.' . $subpage . '|0xFFFFFFFF';
        } else {
            return '(' . $alias . '.' . $subpage . '|0xFFFFFFFF) as ' . $subpage;
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

    /**
     * @param $db
     * @param $subpage
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index($db, $subpage): \Illuminate\Contracts\View\View|Factory|Application
    {
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $skill_array = array('hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');
        } else if (value($db) == '2001scape') { // retro authentic -- omitted unimplemented skills or that could not be leveled by its own
            $skill_array = array('hits', 'ranged', 'prayGood', 'prayEvil', 'goodMagic', 'evilMagic', 'cooking', 'woodcutting', 'firemaking', 'crafting', 'smithing', 'mining');
        } else { // modern authentic
            $skill_array = array('hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
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
			(SUM((' . $this->cast('a', 'attack') . ') +
			(' . $this->cast('a', 'strength') . ') +
			(' . $this->cast('a', 'defense') . ') +
			(' . $this->cast('a', 'hits') . ') +
			(' . $this->cast('a', 'ranged') . ') +
			(' . $this->cast('a', 'prayer') . ') +
			(' . $this->cast('a', 'magic') . ') +
			(' . $this->cast('a', 'cooking') . ') +
			(' . $this->cast('a', 'woodcut') . ') +
			(' . $this->cast('a', 'fletching') . ') +
			(' . $this->cast('a', 'fishing') . ') +
			(' . $this->cast('a', 'firemaking') . ') +
			(' . $this->cast('a', 'crafting') . ') +
			(' . $this->cast('a', 'smithing') . ') +
			(' . $this->cast('a', 'mining') . ') +
			(' . $this->cast('a', 'herblaw') . ') +
			(' . $this->cast('a', 'agility') . ') +
			(' . $this->cast('a', 'thieving') . ') +
			(' . $this->cast('a', 'runecraft') . ') +
			(' . $this->cast('a', 'harvesting') . '))
			/4.0)
			as total_xp
			'), ...$this->skill_cast('a', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        } else if (value($db) == '2001scape') { // retro authentic
            $players = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayGood') . ') +
			(' . $this->coalesce('a', 'aa', 'prayEvil') . ') +
			(' . $this->coalesce('a', 'aa', 'goodMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'evilMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcutting') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'influence') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . ') +
			(' . $this->coalesce('a', 'aa', 'tailoring') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . '))
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
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayer') . ') +
			(' . $this->coalesce('a', 'aa', 'magic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcut') . ') +
			(' . $this->coalesce('a', 'aa', 'fletching') . ') +
			(' . $this->coalesce('a', 'aa', 'fishing') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . ') +
			(' . $this->coalesce('a', 'aa', 'agility') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . '))
			/4.0)
			as total_xp
			'), ...$this->skill_coalesce('a', 'aa', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        }

        if (!$players) {
            abort(404);
        }

        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $rank_overall = DB::connection($db)
                ->table("experience as a")
                ->join("players as b", function ($join) {
                    $join->on("a.playerid", "=", "b.id");
                })
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select(DB::raw("COUNT(b.skill_total) as rank"))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['c.iron_man', '!=', '4'],
                    ["b.skill_total", ">", function ($query) use ($subpage) {
                        $query
                            ->select(DB::raw("b.skill_total"))
                            ->from("players AS b")
                            ->orderBy('b.skill_total', 'desc')
                            ->whereNotIn('b.banned', [-1, 1])
                            ->where([
                                ['b.group_id', '>=', '8'],
                                ["b.username", '=', $subpage],
                                ['c.iron_man', '!=', '4'],
                            ]);
                    }]
                ])
                ->get();
        } else { // authentic
            $rank_overall = DB::connection($db)
                ->table("experience as a")
                ->join("players as b", function ($join) {
                    $join->on("a.playerid", "=", "b.id");
                })
                ->select(DB::raw("COUNT(b.skill_total) as rank"))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ["b.skill_total", ">", function ($query) use ($subpage) {
                        $query
                            ->select(DB::raw("b.skill_total"))
                            ->from("players AS b")
                            ->orderBy('b.skill_total', 'desc')
                            ->whereNotIn('b.banned', [-1, 1])
                            ->where([
                                ['b.group_id', '>=', '8'],
                                ["b.username", '=', $subpage],
                            ]);
                    }]
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
                    ['b.kills', '>', '0']
                ])
                ->paginate(21);
        }
        return view('player', [
            'subpage' => $subpage,
            'players' => $players,
            'rank_overall' => $rank_overall,
            'skill_array' => $skill_array,
            'db' => $db,
            'hiscores' => $hiscores
        ])
            ->with(compact('players'));
    }

    /**
     * @param $db
     * @return Factory|View
     */
    public function shar($db): Factory|View
    {
        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $banks = DB::connection($db)
            ->table('bank as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('itemdef as c', 'a.id', '=', 'c.id')
            ->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
            ->Where([
                ['b.username', '=', 'shar'],
            ])
            ->orderBy('a.slot', 'asc')
            ->get();

        if (!$banks) {
            abort(404);
        }

        return view('bank', [
            'banks' => $banks,
            'db' => $db,
        ]);
    }

    /**
     * @param $db
     * @param $subpage
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function bank($db, $subpage)
    {
        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $banks = DB::connection($db)
            ->table('bank as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('itemdef as c', 'a.id', '=', 'c.id')
            ->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
            ->whereNotIn('b.banned', [-1, 1])
            ->where([
                ['b.username', '=', $subpage],
            ])
            ->orderBy('a.slot', 'asc')
            ->get();

        if (!$banks) {
            abort(404);
        }

        if (!Auth::check()) {
            return redirect('home');
        }

        return view('bank', [
            'subpage' => $subpage,
            'banks' => $banks,
            'db' => $db,
        ])
            ->with(compact('banks'));
    }

    /**
     * @param $db
     * @param $subpage
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function invitem($db, $subpage)
    {
        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection($db)
            ->table('invitems as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('itemdef as c', 'a.id', '=', 'c.id')
            ->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
            ->whereNotIn('b.banned', [-1, 1])
            ->where([
                ['b.username', '=', $subpage],
            ])
            ->orderBy('a.slot', 'asc')
            ->get();

        if (!$invitems) {
            abort(404);
        }

        if (!Auth::check()) {
            return redirect('home');
        }

        return view('invitem', [
            'subpage' => $subpage,
            'invitems' => $invitems,
            'db' => $db,
        ])
            ->with(compact('invitems'));
    }

    public function exportView(Request $request)
    {
        if (!config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && !Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && !Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        $data = false;
        if ($this->debugPlayerExports) {
            $data = $request->input('data') ?? "";
        }
        return view('playerexportform', [
            'success' => '',
            'data' => $data
        ]);
    }
    
    public function exportInstructions(Request $request)
    {
        if (!config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && !Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && !Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        return view('playerexportinstructions', []);
    }

    public function exportSubmit(Request $request)
    {
        if (!config('openrsc.player_exports_enabled')) {
            abort(404);
        }
        if (config('openrsc.player_exports_admin_only') && !Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (config('openrsc.player_exports_moderator_only') && !Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        try {
            $validated = $this->validate($request, [
                'username' => ['bail', 'regex:/^([-a-z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                'db' => ['required', Rule::in(['preservation','cabbage','2001scape','coleslaw','uranium','openpk'])],
                'password' => 'required|min:4|max:20',
            ]);
        } catch (ValidationException $e) {
            return redirect(route('PlayerExportView'))->withErrors("Validation failed");
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
            return redirect(route('PlayerExportView'))->withErrors("Invalid credentials");
        }
        if (player_is_online($db, $trimmed_username)) {
            return redirect(route('PlayerExportView'))->withErrors("You must be logged out to create a player export");
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
                return redirect(route('PlayerExportView'))->withErrors("Invalid credentials");
            }
        } else if (!Hash::check($trimmed_pass, $user->pass)) { //Otherwise, we have a bcrypt hash in the DB to check.
            return redirect(route('PlayerExportView'))->withErrors("Invalid credentials");
        }
        $data = "";
  
        $playerExportService = new PlayerExportService($trimmed_username, $db);
        $data = $playerExportService->execute();
        
        if ($this->debugPlayerExports) {
            return view('playerexportform', [
                'success' => true,
                'data' => $data
            ]);
        }
        $success = "";
        if ($data) {
            $success = "Player export generated successfully.";
            try {
                return Response::make($playerExportService->generateFile(), 200, $playerExportService->generateAttachmentHeaders());
            } catch (\Exception $e) {
                \Log::error("Could not generate player export for username $trimmed_username DB $db at " . $playerExportService->getDateString() . " with error: " . $e->getMessage());
                return redirect(route('PlayerExportView'))->withErrors("Could not generate export, please try again later.");
            }
        }
        return view('playerexportform', [
            'success' => $success
        ]);
    }
    
    public function passwordNeedsRehash($passwordHashed) {
		return !str_starts_with($passwordHashed, "$2y$10$");
	}
    
    
}
