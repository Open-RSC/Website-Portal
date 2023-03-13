<?php

namespace App\Http;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news_feed = [];
        if (config('openrsc.board_enabled')) {
            // Forum news posts
            $news_feed = DB::connection('board')->table('phpbb_posts as p')
                ->join('phpbb_topics AS t', 't.topic_first_post_id', '=', 'p.post_id')
                ->where([
                    ['t.forum_id', '=', '2'], // forum ID for the news (/viewforum.php?f=18)
                    ['t.topic_status', '=', '0'], // topic not locked or deleted
                    ['p.post_visibility', '=', '1'], // post not deleted and is visible
                ])
                ->orderBy('t.topic_time', 'desc')
                ->limit(5)
                ->get();
        }
        
        // World online player counts
        $preservation_online = DB::connection('preservation')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $cabbage_online = DB::connection('cabbage')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $uranium_online = DB::connection('uranium')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $coleslaw_online = DB::connection('coleslaw')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $retro_online = DB::connection('2001scape')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $openpk_online = DB::connection('openpk')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        //World logged in players over the last 48h
        $preservation_48 = DB::connection('preservation')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $cabbage_48 = DB::connection('cabbage')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $uranium_48 = DB::connection('uranium')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $coleslaw_48 = DB::connection('coleslaw')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $retro_48 = DB::connection('2001scape')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $openpk_48 = DB::connection('openpk')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->Orwhere([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        return view(
            'Home',
            [
                'news_feed' => $news_feed,
                'worlds' => [
                    /* legit worlds */
                    array("name" => "RSC Preservation", "online" => $preservation_online, "last48" => $preservation_48, "dev" => false, "type" => "players", "webclient" => true, "alias" => "preservation"),
                    array("name" => "RSC Cabbage", "online" => $cabbage_online, "last48" => $cabbage_48, "dev" => false, "type" => "players", "webclient" => false, "alias" => "cabbage"),
                    array("name" => "2001Scape", "online" => $retro_online, "last48" => $retro_48, "dev" => false, "type" => "players", "webclient" => true, "alias" => "2001scape"),
                    array("name" => "Open PK", "online" => $openpk_online, "last48" => $openpk_48, "dev" => true, "type" => "players", "webclient" => false, "alias" => "openpk"),
                    /* bot allowed */
                    array("name" => "RSC Uranium", "online" => $uranium_online, "last48" => $uranium_48, "dev" => false, "type" => "cyborgs", "webclient" => true, "alias" => "uranium"),
                    array("name" => "RSC Coleslaw", "online" => $coleslaw_online, "last48" => $coleslaw_48, "dev" => false, "type" => "cyborgs", "webclient" => false, "alias" => "coleslaw"),
                ]
            ]
        );
    }

    public function wilderness(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Wilderness_Map');
    }

    public function faq(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Frequently_Asked_Questions');
    }

    public function terms(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Frequently_Asked_Questions');
    }

    public function privacy(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Frequently_Asked_Questions');
    }

    public function rules(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Rules_and_Security');
    }

    public function worldmap($db): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $playerPositions = DB::connection($db)
            ->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.group_id', '>=', '8'],
                ['b.online', '=', '1'],
                ['b.block_private', '=', '0'],
                ['b.y', '>=', '384'],
                ['b.y', '<=', '910']
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->get();

        $playerPositions = $playerPositions->toArray();

        return view('World_Map', [
            'playerPositions' => $playerPositions,
        ]);
    }

    public function playnow(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $desktopClientUrl = '/downloads/OpenRSC.jar';
        $androidClientUrl = '/downloads/openrsc.apk';
        $desktopClientName = 'Desktop Client';
        $androidClientName = 'Android Client';

        $gameClientUrl = $desktopClientUrl;
        $gameClientName = $desktopClientName;
        $graphicImageUrl = '/img/PlayNowGraphic-Desktop.png';
        $otherOSName = 'Android';
        $otherClientUrl = $androidClientUrl;
        $otherClientName = $androidClientName;

        // Detect Android client and change properties
        $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (str_contains($useragent, 'android')) {
            $gameClientUrl = $androidClientUrl;
            $gameClientName = $androidClientName;
            $graphicImageUrl = '/img/PlayNowGraphic-Android.png';
            $otherOSName = 'PC';
            $otherClientUrl = $desktopClientUrl;
            $otherClientName = $desktopClientName;
        }

        return view('playnow', [
            'gameClientUrl' => $gameClientUrl,
            'gameClientName' => $gameClientName,
            'graphicImageUrl' => $graphicImageUrl,
            'otherOSName' => $otherOSName,
            'otherClientUrl' => $otherClientUrl,
            'otherClientName' => $otherClientName
        ]);
    }

    public function worldlist(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // World online player counts
        $preservation_online = DB::connection('preservation')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $cabbage_online = DB::connection('cabbage')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $uranium_online = DB::connection('uranium')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $coleslaw_online = DB::connection('coleslaw')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $retro_online = DB::connection('2001scape')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        $openpk_online = DB::connection('openpk')->table('players as b')
            ->leftJoin('player_cache as a', function ($join) {
                $join->on('b.id', '=', 'a.playerID');
                $join->on('a.key', '=', DB::raw("'setting_hide_online'"));
            })
            ->where([
                ['b.online', '=', '1'],
            ])
            ->where(function ($q) {
                $q->where('a.value', '0')
                    ->orWhereNull('a.value');
            })
            ->count('b.online');

        return view(
            'worldlist',
            [
                'worlds' => [
                    /* legit worlds */
                    array("name" => "RSC Preservation", "online" => $preservation_online, "dev" => false, "type" => "players", "webclient" => true, "alias" => "preservation"),
                    array("name" => "RSC Cabbage", "online" => $cabbage_online, "dev" => false, "type" => "players", "webclient" => false, "alias" => "cabbage"),
                    array("name" => "2001Scape", "online" => $retro_online, "dev" => false, "type" => "players", "webclient" => true, "alias" => "2001scape"),
                    array("name" => "Open PK", "online" => $openpk_online, "dev" => true, "type" => "players", "webclient" => false, "alias" => "openpk"),
                    /* bot allowed */
                    array("name" => "RSC Uranium", "online" => $uranium_online, "dev" => false, "type" => "cyborgs", "webclient" => true, "alias" => "uranium"),
                    array("name" => "RSC Coleslaw", "online" => $coleslaw_online, "dev" => false, "type" => "cyborgs", "webclient" => false, "alias" => "coleslaw"),
                ]
            ]
        );
    }

    public function play($game, $members): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $game = preg_replace("/[^A-Za-z0-9 ]/", "_", $game);
        $members = preg_replace("/[^A-Za-z0-9 ]/", "_", $members);
        $retro = false;

        if (value($game) == 'uranium') {
            $port = 43435;
        }
        if (value($game) == 'preservation') {
            $port = 43496;
        }
        if (value($game) == 'cabbage') {
            $port = 43495;
        }
        if (value($game) == 'coleslaw') {
            $port = 43499;
        }
        if (value($game) == '2001scape') {
            $port = 43493;
            $retro = true;
        }
        if (value($game) == 'openpk') {
            $port = 43497;
        }

        return view(
            'play',
            [
                'retro' => $retro,
                'game' => $game,
                'members' => $members,
                'port' => $port,
            ]
        );
    }
}
