<?php

namespace App\Http;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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

    public function index($subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

        $hiscores = DB::connection('cabbage')
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->select('b.*', 'a.*')
            ->where([
                ['b.id', '=', $subpage],
            ])
            ->orWhere([
                ['b.username', '=', $subpage],
            ])
            ->get();

        $skill_array = Config::get('app.authentic') == true ? array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

        /**
         * @var $players
         * Fetches the table row of the player experience in view and paginates the results
         */
        $players = DB::connection('cabbage')
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('ironman as c', 'b.id', '=', 'c.playerID')
            ->select('b.*', 'c.*', 'a.*')
            ->where([
                ['b.id', '=', $subpage],
            ])
            ->orWhere([
                ['b.username', '=', $subpage],
            ])
            ->get();
        if (!$players) {
            abort(404);
        }

        return view('player', [
            'subpage' => $subpage,
            'hiscores' => $hiscores,
            'players' => $players,
            'skill_array' => $skill_array,
        ])
            ->with(compact('players'));
    }

    /**
     * @return Factory|View
     */
    public function shar()
    {
        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $banks = DB::connection('cabbage')
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
        ]);
    }

    /**
     * @param $subpage
     * @return Factory|View
     */
    public function bank($subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $banks = DB::connection('cabbage')
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
        ])
            ->with(compact('banks'));
    }

    /**
     * @param $subpage
     * @return Factory|View
     */
    public function invitem($subpage)
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

        /**
         * @var $banks
         * Fetches the table row of the player experience in view and paginates the results
         */
        $invitems = DB::connection('cabbage')
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
        ])
            ->with(compact('invitems'));
    }
}
