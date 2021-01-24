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
            ->orderBy('p.post_time', 'desc')
            ->limit(5)
            ->get();

        $preservation_online = DB::connection('preservation')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $cabbage_online = DB::connection('cabbage')->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $online_count = $preservation_online + $cabbage_online;

        return view(
            'Home',
            [
                'news_feed' => $news_feed,
                'online_count' => $online_count,
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

    public function worldmap()
    {
        $playerPositions = DB::connection('cabbage')
            ->table('players')
            ->where([
                ['banned', '=', '0'],
                ['group_id', '=', '10'],
                ['online', '=', '1'],
            ])
            ->get();

        $playerPositions = $playerPositions->toArray();

        return view('World_Map', [
            'playerPositions' => $playerPositions,
        ]);
    }
}
