<?php

namespace App\Http\Controllers;

use App\Models\phpbb_posts;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat_logs(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
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
            'chat_logs',
            [
                'news_feed' => $news_feed,
            ]
        );
    }

    public function pm_logs()
    {
        return view('pm_logs');
    }

    public function trade_logs()
    {
        return view('trade_logs');
    }

    public function generic_logs()
    {
        return view('generic_logs');
    }

    public function shop_logs()
    {
        return view('shop_logs');
    }

    public function auction_logs()
    {
        return view('auction_logs');
    }

    public function live_feed_logs()
    {
        return view('live_feed_logs');
    }

    public function player_cache_logs()
    {
        return view('player_cache_logs');
    }

    public function report_logs()
    {
        return view('report_logs');
    }

    public function staff_logs()
    {
        return view('staff_logs');
    }
}
