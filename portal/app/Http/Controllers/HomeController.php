<?php

namespace App\Http\Controllers;

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

        return view(
            'home',
            [
                'news_feed' => $news_feed,
            ]
        );
    }

    public function wilderness()
    {
        return view('wilderness');
    }

    public function faq()
    {
        return view('faq');
    }

    public function rules()
    {
        return view('rules');
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

        return view('worldmap', [
            'playerPositions' => $playerPositions,
        ]);
    }
}
