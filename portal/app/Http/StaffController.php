<?php

namespace App\Http;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        DB::connection("laravel")->table("viewlogs")->insert([
            'username' => Auth::user()->username,
            'page' => $request->getUri(),
            'ip' => $request->getClientIp(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return view('chat_logs', compact('db'));
    }
    
    public function chatLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
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

    public function pm_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('pm_logs');
    }

    public function trade_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('trade_logs');
    }

    public function generic_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('generic_logs');
    }

    public function shop_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('shop_logs');
    }

    public function auction_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('auction_logs');
    }

    public function live_feed_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('live_feed_logs');
    }

    public function player_cache_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('player_cache_logs');
    }

    public function report_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('report_logs');
    }

    public function staff_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('staff_logs');
    }
}
