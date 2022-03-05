<?php

namespace App\Http;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
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
            'Home',
            [
                'news_feed' => $news_feed,
                'worlds' => [
                    /* legit worlds */
                    array("name" => "RSC Preservation", "online" => $preservation_online, "dev" => false, "type" => "players", "alias"=>"preservation"),
                    array("name" => "RSC Cabbage", "online" => $cabbage_online, "dev" => false, "type" => "players", "alias"=>"cabbage"),
                    array("name" => "2001Scape", "online" => $retro_online, "dev" => false, "type" => "players", "alias"=>"2001scape"),
                    array("name" => "Open PK", "online" => $openpk_online, "dev" => true, "type" => "players", "alias"=>"openpk"),
                    /* bot allowed */
                    array("name" => "RSC Uranium", "online" => $uranium_online, "dev" => false, "type" => "cyborgs", "alias"=>"uranium"),
                    array("name" => "RSC Coleslaw", "online" => $coleslaw_online, "dev" => false, "type" => "cyborgs", "alias"=>"coleslaw"),
                ]
            ]
        );
    }

    public function wilderness()
    {
        return view('Wilderness_Map');
    }

    public function faq()
    {
        return view('Frequently_Asked_Questions');
    }

    public function terms()
    {
        return view('Frequently_Asked_Questions');
    }

    public function privacy()
    {
        return view('Frequently_Asked_Questions');
    }

    public function rules()
    {
        return view('Rules_and_Security');
    }

    public function worldmap($db)
    {
        $playerPositions = DB::connection($db)
            ->table('players')
            ->where([
                ['banned', '!=', '1'],
                ['online', '=', '1'],
                ['group_id', '>=', '8'],
            ])
            ->get();

        $playerPositions = $playerPositions->toArray();

        return view('World_Map', [
            'playerPositions' => $playerPositions,
        ]);
    }

    public function playnow()
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

        return view('playnow',
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
