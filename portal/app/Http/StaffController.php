<?php

namespace App\Http;

use App\Models\itemdef;
use App\Models\players;
use Illuminate\Support\Facades\Schema;
use function App\Helpers\get_client_ip_address;
use Illuminate\Http\Request;
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

    public function login_list(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('loginlist', compact('db'));
    }

    public function loginListData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'login_list',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest chat logs.
        return DataTables::of(DB::connection($db)->table('logins')->select('*', 'players.username as username', 'players.id as playerID')->join('players', 'logins.playerID', '=', 'players.id')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function player_list(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('playerlist', compact('db'));
    }

    public function player_view(Request $request, $db, $id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        $player = DB::connection($db)->table('players')->where('id', '=', $id)->first();

        if ($player === null) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'player_view',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => '',
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return view('playerview', compact('db', 'player'));
    }

    public function playerListData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'player_list',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest chat logs.
        $query = DB::connection($db)->table('players')->orderBy('creation_date', 'desc')->limit(20000)->get();
        $data = Gate::allows('admin', Auth::user()) ? $query->toArray() : $query->map(fn ($item) => (object) (collect($item)->except(['email', 'salt', 'pass', 'creation_ip', 'login_ip', 'lastRecoveryTryId']))->all())->toArray();

        return DataTables::of($data)
                ->editColumn('creation_date', function ($data) {
                    return Carbon::createFromTimestamp($data->creation_date)->format('Y-m-d H:i:s');
                })
                ->editColumn('login_date', function ($data) {
                    return Carbon::createFromTimestamp($data->login_date)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function chat_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('chat_logs', compact('db'));
    }

    public function chatLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'chat_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest chat logs.
        return DataTables::of(DB::connection($db)->table('chat_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function globalchat_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('globalchat_logs', compact('db'));
    }

    public function globalChatLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'globalchat_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest chat logs.
        return DataTables::of(DB::connection($db)->table('private_message_logs')->orderBy('time', 'desc')->where('reciever', '=', 'Global$')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function pm_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        //Here we hardcode orderBy time because we only want the latest logs.
        return view('pm_logs', compact('db'));
    }

    public function pmLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'pm_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('private_message_logs')->orderBy('time', 'desc')->where('reciever', '!=', 'Global$')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function trade_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('trade_logs', compact('db'));
    }

    public function tradeLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'trade_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('trade_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })->editColumn('player1_items', function ($data) {
                    return str_replace(',', ",\n", $data->player1_items);
                })->editColumn('player2_items', function ($data) {
                    return str_replace(',', ",\n", $data->player2_items);
                })
                ->smart(true)
                ->make();
    }

    public function generic_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('generic_logs', compact('db'));
    }

    public function genericLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'generic_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('generic_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function auction_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('auction_logs', compact('db'));
    }

    public function auctionLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'auction_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('auctions')->orderBy('time', 'desc')->where('was_cancel', '=', 0)->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })->editColumn('buyer_info', function ($data) {
                    return str_replace(',', ",\n", $data->buyer_info);
                })
                ->smart(true)
                ->make();
    }

    public function live_feed_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('live_feed_logs', compact('db'));
    }

    public function player_cache_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('player_cache_logs', compact('db'));
    }

    public function report_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('report_logs', compact('db'));
    }

    public function rename_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }

        return view('rename_logs', compact('db'));
    }

    public function renameLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'rename_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('former_names')->select(['*', 'players.username AS currentName'])->join('players', 'former_names.playerID', '=', 'players.id')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function staff_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('staff_logs', compact('db'));
    }

    public function staffLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        DB::connection('laravel')->table('viewlogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'staff_logs',
            'game' => $db,
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'search_terms' => $request->query('search')['value'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //Here we hardcode orderBy time because we only want the latest logs.
        return DataTables::of(DB::connection($db)->table('staff_logs')->orderBy('time', 'desc')->limit(20000)->get()->toArray())
                ->editColumn('time', function ($data) {
                    return Carbon::createFromTimestamp($data->time)->format('Y-m-d H:i:s');
                })
                ->smart(true)
                ->make();
    }

    public function errorLogsData()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        //Here we format the date columns for easier viewing.
        return DataTables::of(DB::table('error_logs')->orderBy('created_at', 'desc')->get())
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function ($data) {
                    return Carbon::parse($data->updated_at)->format('Y-m-d H:i:s');
                })
                ->make();
    }

    public function errorLogsList()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        return view('errorlogslist');
    }

    public function errorLogsView($id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $errorLog = DB::table('error_logs')->where('id', $id)->first();
        return view('errorlogsdetail', ['errorLog' => $errorLog]);
    }

    public function itemStatsList($db, $itemID)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        if (!Schema::connection($db)->hasTable('itemdef')) {
            abort(404, 'The itemdef table does not exist in the database.');
        }

        $item = itemdef::on($db)->where("id", "=", $itemID)->first();

        if (!$item) {
            abort(404);
        }

        return view('itemstatslist', ['itemID' => $itemID, 'item' => $item, 'db' => $db]);
    }

    public function itemStatsData($db, $itemID)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        $bankQuery = DB::connection($db)
            ->table('players as p')
            ->leftJoin('bank as b', 'p.id', '=', 'b.playerID')
            ->leftJoin('itemstatuses as is_b', 'b.itemID', '=', 'is_b.itemID')
            ->select('p.username', 'p.id', DB::raw('SUM(is_b.amount) AS bank_count'))
            ->where('is_b.catalogID', $itemID)
            ->where('is_b.amount', '>', 0)
            ->where('p.group_id', '>=', config('group.player_moderator'))
            ->groupBy('p.username')
            ->orderBy('bank_count', 'desc')
            ->limit(100)
            ->get();

        // Second query for inv_count
        $invQuery = DB::connection($db)
            ->table('players as p')
            ->leftJoin('invitems as i', 'p.id', '=', 'i.playerID')
            ->leftJoin('itemstatuses as is_i', 'i.itemID', '=', 'is_i.itemID')
            ->select('p.username', 'p.id', DB::raw('SUM(is_i.amount) AS inv_count'))
            ->where('is_i.catalogID', $itemID)
            ->where('is_i.amount', '>', 0)
            ->where('p.group_id', '>=', config('group.player_moderator'))
            ->groupBy('p.username')
            ->orderBy('inv_count', 'desc')
            ->limit(100)
            ->get();

        // Combine the results in PHP
        $combined = [];

        foreach ($bankQuery as $result) {
            $username = $result->username;
            if ($result->bank_count > 0) {  // Only add if count > 0
                $combined[$username]['username'] = $username;
                $combined[$username]['bank_count'] = $result->bank_count;
                $combined[$username]['playerID'] = $result->id; // add player id
            }
        }

        foreach ($invQuery as $result) {
            $username = $result->username;
            if ($result->inv_count > 0) {  // Only add if count > 0
                $combined[$username]['username'] = $username;
                $combined[$username]['inv_count'] = $result->inv_count;
                $combined[$username]['playerID'] = $result->id; // add player id
            }
        }

        foreach ($combined as $username => &$data) {
            if (!isset($data['bank_count']) && !isset($data['inv_count'])) {
                unset($combined[$username]);  // Remove entry if both counts are not set
                continue;
            }
            $data['bank_count'] = $data['bank_count'] ?? 0;
            $data['inv_count'] = $data['inv_count'] ?? 0;
            $data['total_count'] = $data['bank_count'] + $data['inv_count'];
            // No need to add playerID here because it should already be set from the queries
        }

        // Limit to top 100 players by total_count
        $combined = array_slice($combined, 0, 100);

        return DataTables::collection($combined)->make(true);
    }

    public function searchPlayerDetailByName(Request $request)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (!Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (!$request->has('name')) {
            abort(404);
        }

        $name = $request->name;
        //$db = $request->db ?? "preservation";
        $db = $request->db;
        $player = players::where('username', '=', $name)->first();

        if (!$player) {
            abort(404);
        }

        $id = $player->id;
        $urlToRedirectTo = "staff/$db/player/$id/detail";

        return redirect()->to($urlToRedirectTo);
    }

}
