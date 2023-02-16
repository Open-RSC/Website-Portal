<?php

namespace App\Http;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('chat_logs', compact('db'));
    }
    
    public function chatLogsData($db) {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return DataTables::of(DB::connection($db)->table('chat_logs')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::parse($data->time)->format("Y-m-d H:i:s");
                })
                ->smart(true)
                ->make();
    }

    public function pm_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('pm_logs');
    }

    public function trade_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('trade_logs');
    }

    public function generic_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('generic_logs');
    }

    public function shop_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('shop_logs');
    }

    public function auction_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('auction_logs');
    }

    public function live_feed_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('live_feed_logs');
    }

    public function player_cache_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('player_cache_logs');
    }

    public function report_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('report_logs');
    }

    public function staff_logs($db)
    {
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('staff_logs');
    }
}
