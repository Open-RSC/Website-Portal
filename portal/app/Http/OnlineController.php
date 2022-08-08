<?php

namespace App\Http;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class OnlineController extends Component
{
    /**
     * @function index()
     * @return Factory|View
     * Used to show the main onlinelist page
     */
    public function index($db): Factory|View
    {
        /**
         * @return Factory|View
         * @var $players
         * Fetches the table row of online players in view and paginates the results
         */

        $player_worlds = array(
            'preservation' => 'RSC Preservation',
            'cabbage' => 'RSC Cabbage',
            '2001scape' => '2001Scape',
            'openpk' => 'Open PK');

        /**
         * Only allow showing of page for player worlds
         */
        if (!in_array($db, array_keys($player_worlds))) {
            abort(404);
        }

        $onlineCount = $this->getOnlineSelect($db)->get()->count();

        $players = $this->getOnlineSelect($db)
            ->limit(ceil($onlineCount))
            ->get();

        return view(
            'onlinelist',
            [
                'world' => $player_worlds[$db],
                'onlineCount' => $onlineCount,
                'players' => $players,
                'db' => $db,
            ]
        );
    }

    private function getOnlineSelect($db) : Builder
    {
        return DB::connection($db)->table('players as b')
            ->leftJoin('player_cache as a', function($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.group_id', '>=', '8'],
                ['b.online', '=', '1'],
                ['b.block_private', '=', '0'],
            ])
            ->where(function($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->leftJoin('player_cache as c', function($join) {
                $join->on('b.id', '=', 'c.playerID');
                $join->on('c.key', '=', DB::raw("'total_played'"));
            })
            ->where([
                ['b.group_id', '>=', '8'],
                ['b.online', '=', '1'],
                ['b.block_private', '=', '0'],
            ])
            ->orderBy('b.username');
    }

    /**
     * Displays a RuneScape time since string
     * @param $timestamp - the old cummulative timestamp in seconds
     * @param $loginstamp - the login timestamp in seconds
     * @return string
     */
    public static function formattedCumTime($timestamp, $loginstamp): string
    {
        $todaystamp = time(); // current timestamp in secs
        $diffSec = $timestamp + ($todaystamp - $loginstamp);

        return self::formattedTime($diffSec);
    }

    /**
     * Displays a RuneScape time since string
     * @param $timestamp - the timestamp in seconds
     * @return string
     */
    public static function formattedTimeSince($timestamp): string
    {
        $todaystamp = time(); // current timestamp in secs
        $diffSec = ($todaystamp - $timestamp);

        return self::formattedTime($diffSec);
    }

    /**
     * Displays a RuneScape time since string
     * @param $timestamp - the timestamp in seconds
     * @return string
     */
    public static function formattedTime($timestamp): string
    {

        $days = floor($timestamp / (3600 * 24));
        $hours = floor($timestamp % (3600 * 24) / 3600);
        $mins = floor($timestamp % 3600 / 60);
        $secs = floor($timestamp % 60);

        if ($days > 0) {
            // use days, hours
            $formatSince = $days . ' ' . Str::plural('day', $days) . ' '. $hours . ' ' . Str::plural('hour', $hours);
        } else if ($hours > 0) {
            // use hours, mins
            $formatSince = $hours . ' ' . Str::plural('hour', $hours) . ' '. $mins . ' ' . Str::plural('min', $mins);
        } else {
            // use mins
            $formatSince = $mins . ' ' . Str::plural('min', $mins);
        }

        return $formatSince;
    }
}