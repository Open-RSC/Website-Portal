<?php

namespace App\Http;

use App\Models\BannedIp;
use App\Models\InviteCode;
use App\Models\itemdef;
use App\Models\players;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Facades\DataTables;

use function App\Helpers\get_client_ip_address;
use function App\Helpers\get_date_from_msec;

class StaffController extends Controller
{

    public function login_list(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('loginlist', compact('db'));
    }

    public function loginListData(Request $request, $db)
    {
        if (Auth::user() === null) return redirect('/login');
        if (! Gate::allows('admin', Auth::user())) abort(404);

        $length = (int) $request->get('length', 10);
        $start  = (int) $request->get('start', 0);
        $search = $request->input('search.value');

        /*
        |--------------------------------------------------------------------------
        | TOTAL COUNT (cached because no index, very slow)
        |--------------------------------------------------------------------------
        */
        $recordsTotal = Cache::remember("logins_count_$db", 300, function () use ($db) {
            return DB::connection($db)->table('logins')->count();
        });

        /*
        |--------------------------------------------------------------------------
        | STEP 1 — find matching player IDs (FAST, small table)
        |--------------------------------------------------------------------------
        */
        $matchingPlayerIds = null;

        if ($search) {
            $matchingPlayerIds = DB::connection($db)
                ->table('players')
                ->where(function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%")
                      ->orWhere('former_name', 'like', "%{$search}%");
                })
                ->pluck('id')
                ->toArray();

            // No matches? Return empty instantly
            if (empty($matchingPlayerIds)) {
                return response()->json([
                    'draw' => intval($request->get('draw')),
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => 0,
                    'data' => [],
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | STEP 2 — page logins FIRST (FAST, uses PK)
        |--------------------------------------------------------------------------
        */
        $base = DB::connection($db)
            ->table('logins')
            ->when($matchingPlayerIds, function ($q) use ($matchingPlayerIds) {
                $q->whereIn('playerID', $matchingPlayerIds);
            })
            ->orderByDesc('dbid')
            ->offset($start)
            ->limit($length);

        /*
        |--------------------------------------------------------------------------
        | STEP 3 — join ONLY those rows to players
        |--------------------------------------------------------------------------
        */
        $query = DB::connection($db)
            ->table(DB::raw("({$base->toSql()}) as l"))
            ->mergeBindings($base)
            ->join('players', 'l.playerID', '=', 'players.id')
            ->select([
                'l.dbid',
                'l.time',
                'l.ip',
                'l.clientVersion',
                'players.username',
                'players.former_name',
            ]);

        $data = $query->get();

        /*
        |--------------------------------------------------------------------------
        | FILTERED COUNT
        |--------------------------------------------------------------------------
        */
        $recordsFiltered = $matchingPlayerIds
            ? DB::connection($db)->table('logins')
                ->whereIn('playerID', $matchingPlayerIds)
                ->count()
            : $recordsTotal;

        /*
        |--------------------------------------------------------------------------
        | FORMAT
        |--------------------------------------------------------------------------
        */
        $data->transform(function ($row) {
            $row->time = date('Y-m-d H:i:s', $row->time);
            return $row;
        });

        /*
        |--------------------------------------------------------------------------
        | Proper DataTables JSON response
        |--------------------------------------------------------------------------
        */
        return response()->json([
            'draw' => intval($request->get('draw')),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);

    }


    public function player_list(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('playerlist', compact('db'));
    }

    public function player_view(Request $request, $db, $id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        $playerData = [];
        $player = DB::connection($db)->table('players')->where('id', '=', $id)->first();
        $playerCacheData = DB::connection($db)->table('player_cache')->where('playerID', '=', $id)->get();
        foreach ($playerCacheData as $row) {
            $playerData[$row->key] = $row->value;
        }
        if ($player === null) {
            abort(404);
        }
        $totalPlayedMs = $playerData['total_played'] ?? 0;
        $timePlayed = get_date_from_msec($totalPlayedMs);
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

        return view('playerview', compact('db', 'player', 'playerData', 'timePlayed'));
    }

    public function playerListData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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
        // Here we hardcode orderBy time because we only want the latest data.
        $query = DB::connection($db)->table('players')
            ->orderBy('creation_date', 'desc');

        if (!Gate::allows('admin', Auth::user())) {
            $query->select([
                'id','username','former_name','group_id','email',
                'combat','skill_total','x','y','fatigue','combatstyle',
                'block_chat','block_private','block_trade','block_duel',
                'cameraauto','onemouse','soundoff','haircolour','topcolour',
                'trousercolour','skincolour','headsprite','bodysprite','male',
                'creation_date','login_date','banned','offences','muted',
                'kills','npc_kills','deaths','online','quest_points'
            ]);
        }

        $currentTimeMillis = time() * 1000;

        return DataTables::of($query)
            ->editColumn('creation_date', function ($data) {
                return Carbon::createFromTimestamp($data->creation_date)->format('Y-m-d H:i:s');
            })
            ->editColumn('login_date', function ($data) {
                return Carbon::createFromTimestamp($data->login_date)->format('Y-m-d H:i:s');
            })
            ->editColumn('muted', function ($data) use ($currentTimeMillis) {
                if ((int) $data->muted === -1) {
                    return 'Permanently';
                } elseif ((int) $data->muted > 0) {
                    if ($currentTimeMillis < (int) $data->muted) {
                        return Carbon::createFromTimestamp($data->muted / 1000)->format('Y-m-d H:i:s');
                    } else {
                        return 'Previously';
                    }
                } else {
                    return 'No';
                }
            })
            ->editColumn('banned', function ($data) use ($currentTimeMillis) {
                if ((int) $data->banned === -1) {
                    return 'Permanently';
                } elseif ((int) $data->banned > 0) {
                    if ($currentTimeMillis < (int) $data->banned) {
                        return Carbon::createFromTimestamp($data->banned / 1000)->format('Y-m-d H:i:s');
                    } else {
                        return 'Previously';
                    }
                } else {
                    return 'No';
                }
            })
            ->smart(true)
            ->make();
    }

    public function chat_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('chat_logs', compact('db'));
    }

    public function chatLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('chat_logs')->orderBy('time', 'desc')->limit(50000)->get()->toArray())
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('globalchat_logs', compact('db'));
    }

    public function globalChatLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('private_message_logs')->orderBy('time', 'desc')->where('reciever', '=', 'Global$')->limit(50000)->get()->toArray())
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
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        // Here we hardcode orderBy time because we only want the latest data.
        return view('pm_logs', compact('db'));
    }

    public function pmLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('private_message_logs')->orderBy('time', 'desc')->where('reciever', '!=', 'Global$')->limit(50000)->get()->toArray())
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('trade_logs', compact('db'));
    }

    public function tradeLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('trade_logs')->orderBy('time', 'desc')->get()->toArray())
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('generic_logs', compact('db'));
    }

    public function genericLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('generic_logs')->orderBy('time', 'desc')->limit(50000)->get()->toArray())
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('auction_logs', compact('db'));
    }

    public function auctionLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('auctions')->orderBy('time', 'desc')->where('was_cancel', '=', 0)->limit(50000)->get()->toArray())
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('live_feed_logs', compact('db'));
    }

    public function player_cache_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('player_cache_logs', compact('db'));
    }

    public function report_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }

        return view('report_logs', compact('db'));
    }

    public function rename_logs(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }

        return view('rename_logs', compact('db'));
    }

    public function renameLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('player-moderator', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('former_names')->select(['*', 'players.username AS currentName'])->join('players', 'former_names.playerID', '=', 'players.id')->orderBy('time', 'desc')->get()->toArray())
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
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('staff_logs', compact('db'));
    }

    public function staffLogsData(Request $request, $db)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
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

        // Here we hardcode orderBy time because we only want the latest data.
        return DataTables::of(DB::connection($db)->table('staff_logs')->orderBy('time', 'desc')->limit(50000)->get()->toArray())
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
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        // Here we format the date columns for easier viewing.
        return DataTables::of(DB::table('error_logs')->orderBy('created_at', 'desc'))
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
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('errorlogslist');
    }

    public function errorLogsView($id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $errorLog = DB::table('error_logs')->where('id', $id)->first();

        return view('errorlogsdetail', ['errorLog' => $errorLog]);
    }

    public function itemStatsItemList($db, $itemID)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        if (! Schema::connection($db)->hasTable('itemdef')) {
            abort(404, "The itemdef table does not exist in the $db database.");
        }

        $item = itemdef::on($db)->where('id', '=', $itemID)->first();

        if (! $item) {
            abort(404);
        }

        return view('itemstatsitemlist', ['itemID' => $itemID, 'item' => $item, 'db' => $db]);
    }

    public function itemStatsItemData($db, $itemID)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
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
            if (! isset($data['bank_count']) && ! isset($data['inv_count'])) {
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
        if (! Gate::allows('moderator', Auth::user())) {
            abort(404);
        }
        if (! $request->has('name')) {
            abort(404);
        }

        $name = $request->name;
        $db = $request->db ?? 'preservation';
        $player = DB::connection($db)->table('players')->where('username', '=', $name)->first();

        if (! $player) {
            abort(404);
        }

        $id = $player->id;
        $urlToRedirectTo = "staff/$db/player/$id/detail";

        return redirect()->to($urlToRedirectTo);
    }

    public function throttlingList()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $throttlingEntries = \DB::table('custom_throttling')->paginate(10);

        return view('throttlinglist', compact('throttlingEntries'));
    }

    public function createThrottling()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        return view('throttlingcreate');
    }

    public function storeThrottling(Request $request)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $request->validate([
            'route_name' => 'required|string|unique:custom_throttling,route_name',
            'max_attempts' => 'required|integer|min:1',
            'decay_minutes' => 'required|integer|min:1',
        ]);

        \DB::table('custom_throttling')->insert($request->only('route_name', 'max_attempts', 'decay_minutes'));

        return redirect()->route('ThrottlingList')->with('success', 'Custom Throttling Entry added!');
    }

    public function editThrottling($id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $entry = \DB::table('custom_throttling')->where('id', $id)->first();

        return view('throttlingedit', compact('entry'));
    }

    public function updateThrottling(Request $request, $id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $request->validate([
            'route_name' => 'required|string|unique:custom_throttling,route_name,'.$id,
            'max_attempts' => 'required|integer|min:1',
            'decay_minutes' => 'required|integer|min:1',
        ]);
        \DB::table('custom_throttling')->where('id', $id)->update($request->only('route_name', 'max_attempts', 'decay_minutes'));

        return redirect()->route('ThrottlingList')->with('success', 'Custom Throttling Entry updated!');
    }

    public function destroyThrottling($id)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        \DB::table('custom_throttling')->where('id', $id)->delete();

        return redirect()->route('ThrottlingList')->with('success', 'Custom Throttling Entry deleted!');
    }

    public function inviteCodesList()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }

        return view('invitecodeslist');
    }

    public function inviteCodesData(Request $request)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('player-moderator', Auth::user())) {
            abort(404);
        }
        $query = InviteCode::query();

        return Datatables::of($query)
            ->editColumn('created_at', function ($inviteCode) {
                return $inviteCode->created_at->format('Y-m-d H:i:s');
            })
            ->toJson();
    }

    public function generateInviteCodes()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        Artisan::call('invite:generate 5');

        return redirect()->back()->with('success', '5 invite codes generated successfully.');
    }

    public function revokeUnusedInviteCodes()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }

        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        $deletedCount = InviteCode::where('used', false)->delete();

        return redirect()->back()->with('success', $deletedCount.' unused invite codes deleted successfully.');
    }

    public function toggleInviteOnly()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        // Additionally, we could log who toggled this, but it's likely not necessary.
        $setting = Setting::firstOrCreate(['key' => 'invite_only_registration'],
            ['value' => '0']);
        $setting->value = $setting->value === '1' ? '0' : '1';
        $setting->save();

        return redirect()->back()->with('success', 'Invite-only registration toggled to '.($setting->value === '1' ? 'Enabled' : 'Disabled'));
    }

    public function adminTasks()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $inviteOnly = (Setting::where('key', 'invite_only_registration')->value('value') === '1') ?? false;

        return view('admintasks', compact('inviteOnly'));
    }

    public function clearCache()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        Artisan::call('cache:clear');

        return redirect()->back()->with('success', 'Cache cleared successfully.');
    }

    public function clearViews()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        Artisan::call('view:clear');

        return redirect()->back()->with('success', 'Views cleared successfully.');
    }

    public function clearRoutes()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        Artisan::call('route:clear');

        return redirect()->back()->with('success', 'Routes cleared successfully.');
    }

    public function clearConfig()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        Artisan::call('config:clear');

        return redirect()->back()->with('success', 'Routes cleared successfully.');
    }

    public function migrateDatabase()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (! defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'rb'));
        }
        if (! defined('STDOUT')) {
            define('STDOUT', fopen('php://stdout', 'wb'));
        }
        if (! defined('STDERR')) {
            define('STDERR', fopen('php://stderr', 'wb'));
        }
        Artisan::call('migrate', ['--path' => 'database/migrations', '--force' => true]);

        return redirect()->back()->with('success', 'Database migrations executed successfully.');
    }

    public function migrateDatabaseRollback()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (! defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'rb'));
        }
        if (! defined('STDOUT')) {
            define('STDOUT', fopen('php://stdout', 'wb'));
        }
        if (! defined('STDERR')) {
            define('STDERR', fopen('php://stderr', 'wb'));
        }
        Artisan::call('migrate:rollback', ['--path' => 'database/migrations', '--force' => true]);

        return redirect()->back()->with('success', 'Database migrations rolled back successfully.');
    }

    public function migrateDatabaseFresh()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (! defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'rb'));
        }
        if (! defined('STDOUT')) {
            define('STDOUT', fopen('php://stdout', 'wb'));
        }
        if (! defined('STDERR')) {
            define('STDERR', fopen('php://stderr', 'wb'));
        }
        Artisan::call('migrate:fresh', ['--path' => 'database/migrations', '--force' => true]);

        return redirect()->back()->with('success', 'Database migrations freshed successfully.');
    }

    public function migrateDatabaseRefresh()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        if (! defined('STDIN')) {
            define('STDIN', fopen('php://stdin', 'rb'));
        }
        if (! defined('STDOUT')) {
            define('STDOUT', fopen('php://stdout', 'wb'));
        }
        if (! defined('STDERR')) {
            define('STDERR', fopen('php://stderr', 'wb'));
        }
        Artisan::call('migrate:refresh', ['--path' => 'database/migrations', '--force' => true]);

        return redirect()->back()->with('success', 'Database refreshed successfully.');
    }

    public function listBannedIpsView()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        $bannedIps = BannedIp::orderBy('id', 'desc')->paginate(10);

        return view('bannedipslist', compact('bannedIps'));
    }

    public function banIp(Request $request)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        // Validate the request...
        $validated = $request->validate([
            'ip_address' => 'required|ip',
        ]);
        $existingBan = BannedIp::where('ip_address', $validated['ip_address'])->first();
        if ($existingBan) {
            // Redirect back with error message
            return back()->with('error', 'This IP address is already banned.');
        }
        // Add the IP address to the banned list
        BannedIp::create(['ip_address' => $validated['ip_address']]);
        DB::connection('laravel')->table('stafflogs')->insert([
            'username' => Auth::user()->username,
            'page' => 'banned_ips',
            'game' => 'laravel',
            'url' => $request->fullUrlWithQuery($request->query->all()),
            'description' => 'Banned IP '.$validated['ip_address'],
            'ip' => get_client_ip_address(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with success message
        return back()->with('success', 'IP address banned successfully.');
    }

    public function unbanIp(Request $request)
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }
        // Validate the request...
        $validated = $request->validate([
            'ip_address' => 'required|ip',
        ]);

        // Remove the IP address from the banned list
        $unbanned = BannedIp::where('ip_address', $validated['ip_address'])->delete();

        // Check if the operation was successful
        if ($unbanned) {
            DB::connection('laravel')->table('stafflogs')->insert([
                'username' => Auth::user()->username,
                'page' => 'banned_ips',
                'game' => 'laravel',
                'url' => $request->fullUrlWithQuery($request->query->all()),
                'description' => 'Unbanned IP '.$validated['ip_address'],
                'ip' => get_client_ip_address(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Redirect back with success message
            return back()->with('success', 'IP address unbanned successfully.');
        } else {
            // Redirect back with error message
            return back()->with('error', 'IP address not found.');
        }
    }

    public function webserverInfo()
    {
        if (Auth::user() === null) {
            return redirect('/login');
        }
        if (! Gate::allows('admin', Auth::user())) {
            abort(404);
        }

        $info = [
            'Laravel Version' => app()->version(),
            'PHP Version' => PHP_VERSION,
            'MySQL Version' => DB::select('SELECT VERSION() as version')[0]->version ?? 'Unknown',
            'Web Server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'Operating System' => php_uname(),
        ];

        return view('webserverinfo', compact('info'));
    }
}
