<?php

namespace App\Http;

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
        $online = DB::connection($db)->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $registrations = DB::connection($db)->table('players')
                ->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
                ->count() ?? '0';

        $logins48 = DB::connection($db)->table('players')
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->orderBy('login_date', 'desc')
            ->count();

        $totalPlayers = DB::connection($db)->table('players')
                ->count() ?? '0';

        $uniquePlayers = DB::connection($db)->table('players')
            ->distinct('creation_ip')
            ->count('creation_ip');

        $createdToday = DB::connection($db)->table('players')
            ->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
            ->orderBy('login_date', 'desc')
            ->orderBy('creation_date', 'desc')
            ->count();

        /*$milliseconds = DB::connection('cabbage')->table('player_cache')
            ->where('key', 'total_played')
            ->sum('value');

        $totalTime = HomeController::secondsToTime(round($milliseconds / 1000));*/

        $current_timestamp = now()->timestamp;

        $sumgold_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold = $sumgold_B + $sumgold_I;

        /*$combat30 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '30'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $combat50 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '50'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $combat80 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '50'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $combat90 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '90'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $combat100 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '100'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $combat123 = DB::connection($db)->table('players')
            ->where([
                ['combat', '>=', '123'],
                ['group_id', '=', '10'],
                ['banned', '=', 0],
            ])
            ->count();

        $startedQuest = DB::connection($db)->table('quests as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['A.group_id', '=', '10'],
                ['A.banned', '=', 0],
            ])
            ->distinct('B.playerID')
            ->count();*/

        /*$gold30_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '30000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold30_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '30000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold30 = $gold30_B + $gold30_I;

        $gold50_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '50000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold50_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '50000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold50 = $gold50_B + $gold50_I;

        $gold80_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '80000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold80_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '80000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold80 = $gold80_B + $gold80_I;

        $gold120_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '120000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold120_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '120000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold120 = $gold120_B + $gold120_I;

        $gold400_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '400000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold400_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '400000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold400 = $gold400_B + $gold400_I;*/

        $gold1m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '1000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold1m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '1000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold1m = $gold1m_B + $gold1m_I;

        /*$gold12m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '12000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold12m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '12000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold12m = $gold12m_B + $gold12m_I;

        $gold15m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '15000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold15m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '15000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold15m = $gold15m_B + $gold15m_I;

        $gold2m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '2000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold2m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '2000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold2m = $gold2m_B + $gold2m_I;*/

        $gold5m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '5000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold5m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '4000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold5m = $gold5m_B + $gold5m_I;

        $gold10m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            //->join('invitems as I', 'I.playerID', '=', 'A.id')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '10000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold10m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '10000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->count();

        $gold10m = $gold10m_B + $gold10m_I;

        $pumpkin_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '422'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $pumpkin_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '422'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $pumpkin_A = 0;
        if ($db === 'cabbage') {
            $pumpkin_A = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '422'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $pumpkin = $pumpkin_B + $pumpkin_I + $pumpkin_A;     
        
        $cracker_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '575'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $cracker_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '575'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $cracker_a = 0;
        if ($db === 'cabbage') {
            $cracker_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '575'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $cracker = $cracker_b + $cracker_i + $cracker_a;
        
        $redphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '576'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $redphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '576'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $redphat_a = 0;
        if ($db === 'cabbage') {
            $redphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '576'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $redphat = $redphat_b + $redphat_i + $redphat_a;
        
        $yellowphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '577'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $yellowphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '577'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $yellowphat_a = 0;
        if ($db === 'cabbage') {
            $yellowphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '577'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $yellowphat = $yellowphat_b + $yellowphat_i + $yellowphat_a;
        
        $bluephat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '578'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $bluephat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '578'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $bluephat_a = 0;
        if ($db === 'cabbage') {
            $bluephat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '578'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $bluephat = $bluephat_b + $bluephat_i + $bluephat_a;
        
        $greenphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '579'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $greenphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '579'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $greenphat_a = 0;
        if ($db === 'cabbage') {
            $greenphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '579'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $greenphat = $greenphat_b + $greenphat_i + $greenphat_a;
        
        $pinkphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '580'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $pinkphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '580'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $pinkphat_a = 0;
        if ($db === 'cabbage') {
            $pinkphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '580'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $pinkphat = $pinkphat_b + $pinkphat_i + $pinkphat_a;
        
        $whitephat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        //->join('invitems as I', 'I.playerID', '=', 'A.id')
        ->where([
            ['S.catalogID', '=', '581'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();

        $whitephat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '581'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->count();
        
        $whitephat_a = 0;
        if ($db === 'cabbage') {
            $whitephat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '581'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->count();
        }
        $whitephat = $whitephat_b + $whitephat_i + $whitephat_a;

        /*$cracker = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '575'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');
        
       $redphat = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '576'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $yellowphat = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '577'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $whitephat = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '581'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $purplephat = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '580'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $bluephat = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '578'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $greenphatBank = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->join('itemstatuses AS C', 'C.itemID', '=', 'B.itemID')
            ->where([
                ['B.itemID', '=', '579'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('C.amount');

        $greenphatInvitems = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '579'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $greenphat = $greenphatInvitems + $greenphatBank;

        $eastereggInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '677'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $eastereggBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '677'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $easteregg = $eastereggInvitems + $eastereggBank;

        $redmaskInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '831'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $redmaskBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '831'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $redmask = $redmaskInvitems + $redmaskBank;

        $bluemaskInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '832'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $bluemaskBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '832'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $bluemask = $bluemaskInvitems + $bluemaskBank;

        $greenmaskInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '828'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $greenmaskBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '828'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $greenmask = $greenmaskInvitems + $greenmaskBank;

        $santahatInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '971'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $santahatBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '971'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $santahat = $santahatInvitems + $santahatBank;

        $bunnyearsInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1156'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $bunnyearsBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1156'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $bunnyears = $bunnyearsInvitems + $bunnyearsBank;

        $scytheInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1289'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $scytheBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1289'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $scythe = $scytheInvitems + $scytheBank;

        $dsqInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1278'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dsqBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '1278'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dsq = $dsqInvitems + $dsqBank;

        $dmedInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '795'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dmedBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '795'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dmed = $dmedInvitems + $dmedBank;

        $dammyInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '522'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->orWhere([
                ['B.id', '=', '597'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dammyBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '522'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->orWhere([
                ['B.id', '=', '597'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dammy = $dammyInvitems + $dammyBank;

        $dbattleInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '594'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dbattleBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '594'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dbattle = $dbattleInvitems + $dbattleBank;

        $dlongInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '593'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dlongBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '593'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $dlong = $dlongInvitems + $dlongBank;

        $cabbageInvitems = DB::connection($db)->table('bank as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '18'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->orWhere([
                ['B.id', '=', '228'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $cabbageBank = DB::connection($db)->table('invitems as B')
            ->join('players AS A', 'A.id', '=', 'B.playerID')
            ->where([
                ['B.id', '=', '18'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->orWhere([
                ['B.id', '=', '228'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('B.amount');

        $cabbage = $cabbageInvitems + $cabbageBank;*/
        //TODO: dump queries info into a CSV (or similar) file wilth filename as: databasename_stats_date_hour with hour being the current hour when this page is viewed. This provides historical statistic information.
        return view(
            'stats',
            [
                'online' => $online,
                'registrations' => $registrations,
                'logins48' => $logins48,
                'totalPlayers' => $totalPlayers,
                'uniquePlayers' => $uniquePlayers,
                //'totalTime' => $totalTime,
                'createdToday' => $createdToday,
                /*'combat30' => $combat30,
                'combat50' => $combat50,
                'combat80' => $combat80,
                'combat90' => $combat90,
                'combat100' => $combat100,
                'combat123' => $combat123,
                'startedQuest' => $startedQuest,*/
                'sumgold' => $sumgold,
                /*'gold30' => $gold30,
                'gold50' => $gold50,
                'gold80' => $gold80,
                'gold120' => $gold120,
                'gold400' => $gold400,*/
                'gold1m' => $gold1m,
                /*'gold12m' => $gold12m,
                'gold15m' => $gold15m,
                'gold2m' => $gold2m,*/
                'gold5m' => $gold5m,
                'gold10m' => $gold10m,
                'pumpkin' => $pumpkin,
                'cracker' => $cracker,
                'redphat' => $redphat,
                'yellowphat' => $yellowphat,
                'bluephat' => $bluephat,
                'greenphat' => $greenphat,
                'pinkphat' => $pinkphat,
                'whitephat' => $whitephat,/*
                'easteregg' => $easteregg,
                'redmask' => $redmask,
                'bluemask' => $bluemask,
                'greenmask' => $greenmask,
                'santahat' => $santahat,
                'bunnyears' => $bunnyears,
                'scythe' => $scythe,
                'dsq' => $dsq,
                'dmed' => $dmed,
                'dammy' => $dammy,
                'dbattle' => $dbattle,
                'dlong' => $dlong,
                'cabbage' => $cabbage,*/
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
