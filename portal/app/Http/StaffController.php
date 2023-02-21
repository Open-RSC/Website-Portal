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
            'page' => "chat_logs",
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
        //Here we hardcode orderBy time because we only want the latest chat logs.
        return DataTables::of(DB::connection($db)->table('chat_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
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
        //Here we hardcode orderBy time because we only want the latest logs.
        DB::connection("laravel")->table("viewlogs")->insert([
            'username' => Auth::user()->username,
            'page' => "pm_logs",
            'ip' => $request->getClientIp(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return view('pm_logs', compact('db'));
    }
    
    public function pmLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('private_message_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
                })
                ->smart(true)
                ->make();
    }

    public function trade_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        DB::connection("laravel")->table("viewlogs")->insert([
            'username' => Auth::user()->username,
            'page' => "trade_logs",
            'ip' => $request->getClientIp(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return view('trade_logs', compact('db'));
    }
    
    public function tradeLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('trade_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
                })->editColumn('player1_items', function($data) {
                    return str_replace(",", ",\n", $data->player1_items);
                })->editColumn('player2_items', function($data) {
                    return str_replace(",", ",\n", $data->player2_items);
                })
                ->smart(true)
                ->make();
    }

    public function generic_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('generic_logs', compact('db'));
    }
    
    public function genericLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('generic_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
                })
                ->smart(true)
                ->make();
    }

    public function auction_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('auction_logs', compact('db'));
    }
    
    public function auctionLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('auctions')->orderBy('time', 'desc')->where('was_cancel', '=', 0)->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
                })->editColumn('buyer_info', function($data) {
                    return str_replace(",", ",\n", $data->buyer_info);
                })
                ->smart(true)
                ->make();
    }

    public function live_feed_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('live_feed_logs', compact('db'));
    }

    public function player_cache_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('player_cache_logs', compact('db'));
    }

    public function report_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        return view('report_logs', compact('db'));
    }

    public function staff_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        return view('staff_logs', compact('db'));
    }
    
    public function staffLogsData(Request $request, $db) {
        if (Auth::user() === null) {
            return redirect("/login");
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('staff_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function($data) {
                    return Carbon::createFromTimestamp($data->time)->format("Y-m-d H:i:s");
                })
                ->smart(true)
                ->make();
    }
}
