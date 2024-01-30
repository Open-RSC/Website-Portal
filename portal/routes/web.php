<?php

use App\Http\Auth;
use App\Http\HiscoresController;
use App\Http\HomeController;
use App\Http\ItemController;
use App\Http\NpcController;
use App\Http\PlayerController;
use App\Http\QuestController;
use App\Http\StaffController;
use App\Http\StatsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// General pages
Route::get('/', [HomeController::class, 'home'])->name('Home');
Route::get('/home', [HomeController::class, 'home'])->name('Home Page');
Route::get('worldmap/{db}', [HomeController::class, 'worldmap'])->name('World Map');
Route::get('wilderness', [HomeController::class, 'wilderness'])->name('Wilderness Map');
Route::get('rules', [HomeController::class, 'rules'])->name('Rules and Security');
Route::get('online', [StatsController::class, 'online'])->name('Online list');
Route::get('createdtoday', [StatsController::class, 'createdtoday'])->name('Players Created Today');
Route::get('logins48', [StatsController::class, 'logins48'])->name('Logins in the last 48 hours');
Route::get('faq', [HomeController::class, 'faq'])->name('Frequently Asked Questions');
Route::get('terms', [HomeController::class, 'faq'])->name('Terms and Conditions');
Route::get('privacy', [HomeController::class, 'faq'])->name('Privacy Policy');
Route::get('playnow', [HomeController::class, 'playnow'])->name('Play RS '); // route name purposely left with a space to deconflict
Route::get('playnow/worldlist', [HomeController::class, 'worldlist'])->name('World List');
Route::get('play/{game}/{members}', [HomeController::class, 'play'])->name('Play RS');

// Quest pages
Route::get('quests', [QuestController::class, 'index'])->name('Quests');
Route::get('quest/{subpage}', [QuestController::class, 'show'])->name('{subpage}}');
Route::get('minigames', [QuestController::class, 'minigames'])->name('Mini Games');

// Player pages
Route::get('player/{db}/{subpage}', [PlayerController::class, 'index'])->name('Player')->middleware("custom_throttle");
Route::get('player/{db}/shar/bank', [PlayerController::class, 'sharbank'])->name('sharbank')->middleware("custom_throttle");
Route::get('player/{db}/shar/inventory', [PlayerController::class, 'sharinv'])->name('sharinv')->middleware("custom_throttle");
Route::get('playerexport/', [PlayerController::class, 'exportView'])->name('PlayerExportView');
Route::get('playerexportinstructions/', [PlayerController::class, 'exportInstructions'])->name('PlayerExportInstructions');
Route::post('playerexport/export/', [PlayerController::class, 'exportSubmit'])->middleware(['custom_throttle:15,20'])->name('PlayerExportSubmit');

// Item lookup
Route::any('items', [ItemController::class, 'index'])->name('Items');
Route::any('itemdef/{id}', [ItemController::class, 'show'])->name('Item Information');

// NPC lookup
Route::any('npcs', [NpcController::class, 'index'])->name('Monster Database');
Route::any('npcdef/{id}', [NpcController::class, 'show'])->name('Monster Details');

// Client launcher online world lookup
Route::get('onlinelookup', [StatsController::class, 'onlinelookup'])->name("OnlineLookup")->middleware("custom_throttle");

// Hiscores
Route::any('npchiscores/', [HiscoresController::class, 'npcHiscoresRedirect'])->name('RS NPC Hiscores Redirect')->middleware("custom_throttle");
Route::any('npchiscores/{db}/', [HiscoresController::class, 'npcHiscoresRedirect'])->name('RS NPC Hiscores DB Redirect')->middleware("custom_throttle");
Route::any('npchiscores/{db}/{npc_id}', [HiscoresController::class, 'npcIndex'])->name('RS NPC Hiscores')->middleware("custom_throttle");
Route::any('npchiscores/{db}/player/{player_name}', [HiscoresController::class, 'npcPlayerIndex'])->name('RS Player NPC Hiscores')->middleware("custom_throttle");
Route::any('hiscores/', [HiscoresController::class, 'playerHiscoresRedirect'])->name('RS Hiscores Redirect')->middleware("custom_throttle");
Route::any('hiscores/{db}', [HiscoresController::class, 'index'])->name('RS Hiscores')->middleware("custom_throttle");
Route::any('hiscores/{db}/skill_total', [HiscoresController::class, 'index'])->name('RS Hiscores ')->middleware("custom_throttle"); // route name purposely left with a space to deconflict
Route::any('hiscores/{db}/{subpage}', [HiscoresController::class, 'show'])->middleware("custom_throttle");
Route::any('hiscores/{db}/{subpage}/{iron_man}', [HiscoresController::class, 'iron_man'])->name('RS Ironman Hiscores')->middleware("custom_throttle");
Route::post('searchByName', [HiscoresController::class, 'searchByName'])->name("SearchByName")->middleware("custom_throttle");
Route::post('searchNpcHiscoresByPlayerName', [HiscoresController::class, 'searchNpcHiscoresByPlayerName'])->name("SearchNpcHiscoresByPlayerName")->middleware("custom_throttle");
Route::post('searchNpcHiscoresByNpcName', [HiscoresController::class, 'searchNpcHiscoresByNpcName'])->name("searchNpcHiscoresByNpcName")->middleware("custom_throttle");
Route::any('toplist/{db}', [HiscoresController::class, 'toplist'])->name('RS Hiscore tables'); // route name purposely left with a space to deconflict

// Current players
//Route::any('onlinelist/{db}', 'OnlineController@index')->name('Current RS players');

Route::post('/register', [Auth\RegisteredUserController::class, 'store'])->middleware('throttle:10,15')->name("Register");

Route::get('/discord', function() {
    if (!empty(config('openrsc.discord_url'))) {
        return redirect(config('openrsc.discord_url'));
    }
    return redirect('/');
})->name("Discord");

// Afman staff zone
Route::get('staff/itemstats/{db}/overview', [StatsController::class, 'itemStats'])->name('ItemStatisticsOverview')->middleware('auth');
Route::get('staff/itemstats/{id}/detail', [StatsController::class, 'itemStatsDetail'])->name('ItemStatisticsDetail')->middleware('auth');
Route::get('staff/itemstats', [StatsController::class, 'redirectToItemStats'])->name('ItemStatisticsRedirect')->middleware('auth');
Route::get('staff/itemstats/list', [StatsController::class, 'redirectToItemStatsList'])->name('ItemStatisticsListRedirect')->middleware('auth');
Route::get('staff/itemstats/{db}/list', [StatsController::class, 'itemStatsList'])->name('ItemStatisticsList')->middleware('auth');
Route::get('staff/itemstats/{db}/data', [StatsController::class, 'itemStatsData'])->name('ItemStatisticsData')->middleware('auth');
Route::get('staff/{db}/login_list', [StaffController::class, 'login_list'])->middleware('auth')->name('login_list');
Route::get('staff/{db}/login_list/data', [StaffController::class, 'loginListData'])->middleware('auth')->name('LoginListData');
Route::get('staff/{db}/player_list', [StaffController::class, 'player_list'])->middleware('auth')->name('player_list');
Route::get('staff/{db}/player_list/data', [StaffController::class, 'playerListData'])->middleware('auth')->name('PlayerListData');
Route::get('staff/{db}/player/{id}/detail', [StaffController::class, 'player_view'])->middleware('auth')->name('player_view');
Route::get('staff/{db}/chat_logs', [StaffController::class, 'chat_logs'])->middleware('auth')->name('chat_logs');
Route::get('staff/{db}/chat_logs/data', [StaffController::class, 'chatLogsData'])->middleware('auth')->name('ChatLogsData');
Route::get('staff/{db}/globalchat_logs', [StaffController::class, 'globalchat_logs'])->middleware('auth')->name('globalchat_logs');
Route::get('staff/{db}/globalchat_logs/data', [StaffController::class, 'globalChatLogsData'])->middleware('auth')->name('GlobalChatLogsData');
Route::get('staff/{db}/pm_logs', [StaffController::class, 'pm_logs'])->middleware('auth')->name('pm_logs');
Route::get('staff/{db}/pm_logs/data', [StaffController::class, 'pmLogsData'])->middleware('auth')->name('PmLogsData');
Route::get('staff/{db}/trade_logs', [StaffController::class, 'trade_logs'])->middleware('auth')->name('trade_logs');
Route::get('staff/{db}/trade_logs/data', [StaffController::class, 'tradeLogsData'])->middleware('auth')->name('TradeLogsData');
Route::get('staff/{db}/generic_logs', [StaffController::class, 'generic_logs'])->middleware('auth')->name('generic_logs');
Route::get('staff/{db}/generic_logs/data', [StaffController::class, 'genericLogsData'])->middleware('auth')->name('GenericLogsData');
Route::get('staff/{db}/auction_logs', [StaffController::class, 'auction_logs'])->middleware('auth')->name('auction_logs');
Route::get('staff/{db}/auction_logs/data', [StaffController::class, 'auctionLogsData'])->middleware('auth')->name('AuctionLogsData');
Route::get('staff/{db}/live_feed_logs', [StaffController::class, 'live_feed_logs'])->middleware('auth')->name('live_feed_logs');
Route::get('staff/{db}/player_cache_logs', [StaffController::class, 'player_cache_logs'])->middleware('auth')->name('player_cache_logs');
Route::get('staff/{db}/report_logs', [StaffController::class, 'report_logs'])->middleware('auth')->name('report_logs');
Route::get('staff/{db}/rename_logs', [StaffController::class, 'rename_logs'])->middleware('auth')->name('rename_logs');
Route::get('staff/{db}/rename_logs/data', [StaffController::class, 'renameLogsData'])->middleware('auth')->name('RenameLogsData');
Route::get('staff/{db}/staff_logs', [StaffController::class, 'staff_logs'])->middleware('auth')->name('staff_logs');
Route::get('staff/{db}/staff_logs/data', [StaffController::class, 'staffLogsData'])->middleware('auth')->name('StaffLogsData');
Route::get('staff/error_logs', [StaffController::class, 'errorLogsList'])->middleware('auth')->name('ErrorLogsList');
Route::get('staff/error_logs/data', [StaffController::class, 'errorLogsData'])->middleware('auth')->name('ErrorLogsData');
Route::get('staff/error_logs/{id}', [StaffController::class, 'errorLogsView'])->middleware('auth')->name('ErrorLogsDetail');
Route::get('staff/player/{db}/{subpage}/bank', [PlayerController::class, 'bank'])->middleware('auth')->name('Bank');
Route::get('staff/player/{db}/{subpage}/inventory', [PlayerController::class, 'invitem'])->middleware('auth')->name('Inventory Items');
Route::get('staff/items/{db}/{itemID}/', [StaffController::class, 'itemStatsItemList'])->middleware('auth')->name('ItemStatsItemList');
Route::get('staff/items/{db}/{itemID}/data', [StaffController::class, 'itemStatsItemData'])->middleware('auth')->name('ItemStatsItemData');
Route::post('staff/searchPlayerDetailByName', [StaffController::class, 'searchPlayerDetailByName'])->middleware('auth')->name('searchPlayerDetailByName');
Route::get('staff/admin_tasks', [StaffController::class, 'adminTasks'])->name('AdminTasks');
Route::get('staff/clear-cache', [StaffController::class, 'clearCache'])->name('ClearCache');
Route::get('staff/clear-views', [StaffController::class, 'clearViews'])->name('ClearViews');
Route::get('staff/clear-routes', [StaffController::class, 'clearRoutes'])->name('ClearRoutes');
Route::get('staff/clear-config', [StaffController::class, 'clearConfig'])->name('ClearConfig');
Route::get('staff/migrate-database', [StaffController::class, 'migrateDatabase'])->name('MigrateDatabase');
Route::get('staff/migrate-database-rollback', [StaffController::class, 'migrateDatabaseRollback'])->name('MigrateDatabaseRollback');
Route::get('staff/migrate-database-fresh', [StaffController::class, 'migrateDatabasFresh'])->name('MigrateDatabaseFresh');
Route::get('staff/migrate-database-refresh', [StaffController::class, 'migrateDatabasRefresh'])->name('MigrateDatabaseRefresh');
Route::get('staff/throttling', [StaffController::class, 'throttlingList'])->name('ThrottlingList');
Route::get('staff/throttling/create', [StaffController::class, 'createThrottling'])->name('ThrottlingCreate');
Route::post('staff/throttling', [StaffController::class, 'storeThrottling'])->name('ThrottlingStore');
Route::get('staff/throttling/{id}/edit', [StaffController::class, 'editThrottling'])->name('ThrottlingEdit');
Route::put('staff/throttling/{id}', [StaffController::class, 'updateThrottling'])->name('ThrottlingUpdate');
Route::delete('staff/throttling/destroy/{id}',  [StaffController::class, 'destroyThrottling'])->name('ThrottlingDestroy');
