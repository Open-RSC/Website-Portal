<?php

namespace App\Http;

use App\Services\Stats\StatsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    /**
     * @function index()
     * @return Renderable
     * Shows the main home page and associated database queries
     */
    public function index(): Renderable
    {
        $news_feed = DB::connection('board')->table('phpbb_posts as p')
            ->join('phpbb_topics AS t', 't.topic_first_post_id', '=', 'p.post_id')
            ->where([
                ['t.forum_id', '=', '2'], // forum ID for the news (/viewforum.php?f=18)
                ['t.topic_status', '=', '0'], // topic not locked or deleted
                ['p.post_visibility', '=', '1'], // post not deleted and is visible
            ])
            ->orderBy('p.post_time', 'desc')
            ->limit(5)
            ->get();

        $online = DB::connection('cabbage')->table('players')
            ->where('online', 1)
            ->count();

        $registrations = DB::connection('cabbage')->table('players')
                ->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
                ->count() ?? '0';

        $logins = DB::connection('cabbage')->table('players')
                ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
                ->count() ?? '0';

        $totalPlayers = DB::connection('cabbage')->table('players')
                ->count() ?? '0';

        $uniquePlayers = DB::connection('cabbage')->table('players')
            ->distinct('creation_ip')
            ->count('creation_ip');

        /*$milliseconds = DB::connection('cabbage')->table('player_cache')
            ->where('key', 'total_played')
            ->sum('value');

        $totalTime = HomeController::secondsToTime(round($milliseconds / 1000));*/

        $activityfeed = DB::connection('cabbage')->table('live_feeds as B')
            ->join('players AS A', 'A.username', '=', 'B.username')
            ->where([
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['B.time', '>=', 'unix_timestamp(current_date - interval 10 day)'],
            ])
            ->orderBy('time', 'desc')
            ->limit(5)
            ->get();

        $sumgold_B = DB::connection('cabbage')->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold_I = DB::connection('cabbage')->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold = ($sumgold_B + $sumgold_I);

        return view(
            'home',
            [
                'online' => $online,
                'registrations' => $registrations,
                'logins' => $logins,
                'totalPlayers' => $totalPlayers,
                'uniquePlayers' => $uniquePlayers,
                //'totalTime' => $totalTime,
                'activityfeed' => $activityfeed,
                'sumgold' => $sumgold,
                'news_feed' => $news_feed,
            ]
        );
    }

    /**
     * @function secondsToTime()
     * @param $inputSeconds
     * @return int
     * Used to calculate the total input of seconds into years, days, hours, minutes, and seconds
     */
    public function secondsToTime($inputSeconds): int
    {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;
        $secondsInAYear = 365 * $secondsInADay;

        // Extract years
        $years = floor($inputSeconds / $secondsInAYear);

        // Extract days
        $daySeconds = $inputSeconds % $secondsInAYear;
        $days = floor($daySeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'yr' => (int)$years,
            'day' => (int)$days,
            'hr' => (int)$hours,
            'min' => (int)$minutes,
            'sec' => (int)$seconds,
        ];
        foreach ($sections as $name => $value) {
            if ($value > 0) {
                $timeParts[] = $value . ' ' . $name . ($value == 1 ? '' : 's');
            }
        }
        return implode(', ', $timeParts);
    }

    public function online()
    {
        $players = DB::connection('cabbage')->table('players as B')
            ->join('player_cache AS A', 'A.playerID', '=', 'B.id')
            ->where([
                ['B.online', '=', '1'],
                ['A.key', '=', 'total_played']
            ])
            ->orderBy('B.login_date')
            ->get();

        return view(
            'online',
            [
                'players' => $players,
            ]
        );
    }

    public function createdtoday(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $players = DB::connection('cabbage')->table('players AS B')
            ->whereRaw('B.creation_date >= unix_timestamp(current_date - interval 1 day)')
            ->join('player_cache AS A', 'A.playerID', '=', 'B.id')
            ->where([
                ['A.key', '=', 'total_played']
            ])
            ->orderBy('B.login_date', 'desc')
            ->orderBy('B.creation_date', 'desc')
            ->get();

        return view(
            'createdtoday',
            [
                'players' => $players,
            ]
        );
    }

    public function logins48(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $players = DB::connection('cabbage')->table('players AS B')
            ->whereRaw('B.login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->join('player_cache AS A', 'A.playerID', '=', 'B.id')
            ->where([
                ['A.key', '=', 'total_played']
            ])
            ->orderBy('B.login_date', 'desc')
            ->get();

        return view(
            'logins48',
            [
                'players' => $players,
            ]
        );
    }

    public function stats($db = "cabbage"): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $statsService = new StatsService($db);
        $stats = $statsService->execute();
        if (config('openrsc.stats_page_generates_csv')) {
            $statsService->makeCsv();
        }
        return view(
            'stats',
            [
                'online' => $stats['online'],
                'registrations' => $stats['registrations'],
                'logins48' => $stats['logins48'],
                'totalPlayers' => $stats['totalPlayers'],
                'uniquePlayers' => $stats['uniquePlayers'],
                'createdToday' => $stats['createdToday'],
                'sumgold' => $stats['sumgold'],
                'gold1m' => $stats['gold1m'],
                'gold5m' => $stats['gold5m'],
                'gold10m' => $stats['gold10m'],
                'pumpkin' => $stats['pumpkin'],
                'cracker' => $stats['cracker'],
                'redphat' => $stats['redphat'],
                'yellowphat' => $stats['yellowphat'],
                'bluephat' => $stats['bluephat'],
                'greenphat' => $stats['greenphat'],
                'pinkphat' => $stats['pinkphat'],
                'whitephat' => $stats['whitephat'],
                'easteregg' => $stats['easteregg'],
                'redmask' => $stats['redmask'],
                'bluemask' => $stats['bluemask'],
                'greenmask' => $stats['greenmask'],
                'santahat' => $stats['santahat'],
                'scythe' => $stats['scythe'],
                'dsq' => $stats['dsq'],
                'dmed' => $stats['dmed'],
                'dammy' => $stats['dammy'],
                'dbattle' => $stats['dbattle'],
                'dlong' => $stats['dlong'],
                'rune2h' => $stats['rune2h']
            ]
        );
    }

    public function onlinelookup()
    {
        $preservation_online = DB::connection('preservation')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $cabbage_online = DB::connection('cabbage')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $uranium_online = DB::connection('uranium')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $coleslaw_online = DB::connection('coleslaw')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $retro_online = DB::connection('2001scape')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $openpk_online = DB::connection('openpk')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        return view(
            'onlinelookup',
            [
                'preservation_online' => $preservation_online,
                'cabbage_online' => $cabbage_online,
                'uranium_online' => $uranium_online,
                'coleslaw_online' => $coleslaw_online,
                'retro_online' => $retro_online,
                'openpk_online' => $openpk_online,
            ]
        );
    }

}
