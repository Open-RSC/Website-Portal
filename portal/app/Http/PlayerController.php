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
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
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
                        ->join("players as b", function ($join) {
                            $join->on("a.playerid", "=", "b.id");
                        })
                        ->select("a.$skill")
                        ->where("b.username", "=", $subpage);
                })
                ->whereNotIn('b.banned', [-1, 1])
                ->where("b.group_id", ">=", 8)
                ->where("c.iron_man", "!=", 4)
                ->count();
        } else {
            return DB::connection($db)
                ->table("experience as a")
                ->join("players as b", function ($join) {
                    $join->on("a.playerid", "=", "b.id");
                })
                ->select(DB::raw("count(a.playerid)"))
                ->where("a.$skill", ">", function ($query) use ($db, $subpage, $skill) {
                    $query->from("experience as a")
                        ->join("players as b", function ($join) {
                            $join->on("a.playerid", "=", "b.id");
                        })
                        ->select("a.$skill")
                        ->where("b.username", "=", $subpage);
                })
                ->whereNotIn('b.banned', [-1, 1])
                ->where("b.group_id", ">=", 8)
                ->count();
        }
    }

    public function cast($alias, $subpage, $relabel = false): string {
        if (!$relabel) {
            return $alias . '.' . $subpage . '&0xFFFFFFFF';
        } else {
            return '(' . $alias . '.' . $subpage . '&0xFFFFFFFF) as ' . $subpage;
        }
    }

    public function skill_cast($alias, $skill_array): array {
        return array_map(function ($skill) use ($alias) {
            return DB::raw($this->cast($alias, $skill, true));
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
                ->select('b.*', DB::raw('
			(SUM((' . $this->cast('a', 'attack') . ') +
			(' . $this->cast('a', 'strength') . ') +
			(' . $this->cast('a', 'defense') . ') +
			(' . $this->cast('a', 'hits') . ') +
			(' . $this->cast('a', 'ranged') . ') +
			(' . $this->cast('a', 'prayGood') . ') +
			(' . $this->cast('a', 'prayEvil') . ') +
			(' . $this->cast('a', 'goodMagic') . ') +
			(' . $this->cast('a', 'evilMagic') . ') +
			(' . $this->cast('a', 'cooking') . ') +
			(' . $this->cast('a', 'woodcutting') . ') +
			(' . $this->cast('a', 'firemaking') . ') +
			(' . $this->cast('a', 'crafting') . ') +
			(' . $this->cast('a', 'smithing') . ') +
			(' . $this->cast('a', 'mining') . ') +
			(' . $this->cast('a', 'influence') . ') +
			(' . $this->cast('a', 'thieving') . ') +
			(' . $this->cast('a', 'tailoring') . ') +
			(' . $this->cast('a', 'herblaw') . '))
			/4.0)
			as total_xp
			'), ...$this->skill_cast('a', $skill_array))
                ->where([
                    ['b.username', '=', $subpage],
                ])
                ->get();
        } else { // modern authentic
            $players = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
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
			(' . $this->cast('a', 'thieving') . '))
			/4.0)
			as total_xp
			'), ...$this->skill_cast('a', $skill_array))
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
}
