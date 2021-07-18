<?php

namespace App\Http;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class PlayerController extends Controller
{
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
        return DB::connection($db)
            ->table("experience as a")
            ->join("players as b", function ($join) {
                $join->on("a.playerid", "=", "b.id");
            })
            ->join("ironman as c", function ($join) {
                $join->on("b.id", "=", "c.playerid");
            })
            ->select(DB::raw("count(a.playerid)"))
            ->where("a.$skill", ">", function ($query) use ($db, $subpage, $skill) {
                $query->from("experience as a")
                    ->select("a.$skill")
                    ->where("a.playerid", "=", $subpage);
            })
            ->where("b.banned", "=", 0)
            ->where("b.group_id", ">=", 8)
            ->where("c.iron_man", "!=", 4)
            ->count();
    }

    /**
     * @param $db
     * @param $subpage
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index($db, $subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);

        if (value($db) == 'cabbage') { // custom
            $skill_array = array('hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');
        } else { // authentic
            $skill_array = array('hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
        }

        /**
         * @var $players
         * Fetches the table row of the player experience in view and paginates the results
         */
        $players = DB::connection($db)
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('ironman as c', 'b.id', '=', 'c.playerID')
            ->select('b.*', 'c.*', 'a.*', DB::raw('
			(SUM(a.attack +
			a.strength +
			a.defense +
			a.hits +
			a.ranged +
			a.prayer +
			a.magic +
			a.cooking +
			a.woodcut +
			a.fletching +
			a.fishing +
			a.firemaking +
			a.crafting +
			a.smithing +
			a.mining +
			a.herblaw +
			a.agility +
			a.thieving)
			/4.0)
			as total_xp
			'))
            ->where([
                ['b.id', '=', $subpage],
            ])
            ->get();
        if (!$players) {
            abort(404);
        }

        $rank_overall = DB::connection($db)
            ->table("experience as a")
            ->join("players as b", function ($join) {
                $join->on("a.playerid", "=", "b.id");
            })
            ->join('ironman as c', 'b.id', '=', 'c.playerID')
            ->select(DB::raw("COUNT(b.skill_total) as rank"))
            ->where([
                ['b.banned', '=', '0'],
                ['b.group_id', '>=', '8'],
                ['c.iron_man', '!=', '4'],
                ["b.skill_total", ">", function ($query) use ($subpage) {
                    $query
                        ->select(DB::raw("b.skill_total"))
                        ->from("players AS b")
                        ->orderBy('b.skill_total', 'desc')
                        ->where([
                            ['b.banned', '=', '0'],
                            ['b.group_id', '>=', '8'],
                            ["b.id", '=', $subpage],
                            ['c.iron_man', '!=', '4'],
                        ]);
                }]
            ])
            ->get();

        return view('player', [
            'subpage' => $subpage,
            'players' => $players,
            'rank_overall' => $rank_overall,
            'skill_array' => $skill_array,
            'db' => $db,
        ])
            ->with(compact('players'));
    }

    /**
     * @return Factory|View
     */
    public function shar($db)
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
     * @return Factory|View
     */
    public function bank($db, $subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);

        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $banks = DB::connection($db)
            ->table('bank as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('itemdef as c', 'a.id', '=', 'c.id')
            ->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
            ->where([
                ['b.banned', '=', '0'],
                ['b.id', '=', $subpage],
            ])
            ->orWhere([
                ['b.banned', '=', '0'],
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
     * @return Factory|View
     */
    public function invitem($db, $subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);

        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection($db)
            ->table('invitems as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('itemdef as c', 'a.id', '=', 'c.id')
            ->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
            ->where([
                ['b.banned', '=', '0'],
                ['b.id', '=', $subpage],
            ])
            ->orWhere([
                ['b.banned', '=', '0'],
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
}
