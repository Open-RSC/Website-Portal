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
Route::get('stats/{db}/overview', [StatsController::class, 'stats'])->name('StatisticsOverview')->middleware('auth');
Route::get('stats/{id}/detail', [StatsController::class, 'statsDetail'])->name('StatisticsDetail')->middleware('auth');
Route::get('stats', [StatsController::class, 'redirectToStats'])->name('StatisticsRedirect')->middleware('auth');
Route::get('stats/list', [StatsController::class, 'redirectToStatsList'])->name('StatisticsListRedirect')->middleware('auth');
Route::get('stats/{db}/list', [StatsController::class, 'statsList'])->name('StatisticsList')->middleware('auth');
Route::get('stats/{db}/data', [StatsController::class, 'statsData'])->name('StatisticsData')->middleware('auth');
Route::get('faq', [HomeController::class, 'faq'])->name('Frequently Asked Questions');
Route::get('terms', [HomeController::class, 'faq'])->name('Terms and Conditions');
Route::get('privacy', [HomeController::class, 'faq'])->name('Privacy Policy');
Route::get('playnow', [HomeController::class, 'playnow'])->name('Play RuneScape '); // purposely left with a space to deconflict
Route::get('playnow/worldlist', [HomeController::class, 'worldlist'])->name('World List');
Route::get('play/{game}/{members}', [HomeController::class, 'play'])->name('Play RuneScape');

// Quest pages
Route::get('quests', [QuestController::class, 'index'])->name('Quests');
Route::get('quest/{subpage}', [QuestController::class, 'show'])->name('{subpage}}');
Route::get('minigames', [QuestController::class, 'minigames'])->name('Mini Games');

// Player pages
Route::get('player/{db}/{subpage}', [PlayerController::class, 'index'])->name('Player');
//Route::get('player/{db}/shar/bank', 'PlayerController@shar')->name('sharbank');
Route::get('player/{db}/{subpage}/bank', [PlayerController::class, 'bank'])->middleware('auth:api')->name('Bank');
Route::get('player/{db}/{subpage}/inventory', [PlayerController::class, 'invitem'])->middleware('auth:api')->name('Inventory Items');
Route::get('playerexport/', [PlayerController::class, 'exportView'])->name('PlayerExportView');
Route::get('playerexportinstructions/', [PlayerController::class, 'exportInstructions'])->name('PlayerExportInstructions');
Route::post('playerexport/export/', [PlayerController::class, 'exportSubmit'])->middleware(['throttle:15,20'])->name('PlayerExportSubmit');

// Item lookup
Route::any('items', [ItemController::class, 'index'])->name('Items');
Route::any('itemdef/{id}', [ItemController::class, 'show'])->name('Item Information');

// NPC lookup
Route::any('npcs', [NpcController::class, 'index'])->name('Monster Database');
Route::any('npcdef/{id}', [NpcController::class, 'show'])->name('Monster Details');

// Client launcher online world lookup
Route::get('onlinelookup', [StatsController::class, 'onlinelookup']);

// Hiscores
Route::any('npchiscores/', [HiscoresController::class, 'npcHiscoresRedirect'])->name('RuneScape NPC Hiscores Redirect');
Route::any('npchiscores/{db}/', [HiscoresController::class, 'npcHiscoresRedirect'])->name('RuneScape NPC Hiscores DB Redirect');
Route::any('npchiscores/{db}/{npc_id}', [HiscoresController::class, 'npcIndex'])->name('RuneScape NPC Hiscores');
Route::any('npchiscores/{db}/player/{player_name}', [HiscoresController::class, 'npcPlayerIndex'])->name('RuneScape Player NPC Hiscores');
Route::any('hiscores/', [HiscoresController::class, 'playerHiscoresRedirect'])->name('RuneScape Hiscores Redirect');
Route::any('hiscores/{db}', [HiscoresController::class, 'index'])->name('RuneScape Hiscores');
Route::any('hiscores/{db}/skill_total', [HiscoresController::class, 'index'])->name('RuneScape Hiscores '); // purposely left with a space to deconflict
Route::any('hiscores/{db}/{subpage}', [HiscoresController::class, 'show']);
Route::any('hiscores/{db}/{subpage}/{iron_man}', [HiscoresController::class, 'iron_man'])->name('RuneScape Ironman Hiscores');
Route::post('searchByName', [HiscoresController::class, 'searchByName']);
Route::post('searchNpcHiscoresByName', [HiscoresController::class, 'searchNpcHiscoresByName']);
Route::any('toplist/{db}', [HiscoresController::class, 'toplist'])->name('RuneScape Hiscore tables'); // purposely left with a space to deconflict

// Current players
//Route::any('onlinelist/{db}', 'OnlineController@index')->name('Current RuneScape players');

// Afman staff zone
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

//Route::get('register', 'Livewire\Registration')->name('Player Registration');
//Route::post('register', 'Livewire\Registration')->middleware(['honey', 'honey-recaptcha']);

/*Route::any('login', 'Livewire\Login')->name('Secure_Login');
Route::post('login', 'Livewire\Login')->middleware(['honey', 'honey-recaptcha']);
Route::post('logout', 'Livewire\Login@logout')->name('Logout');*/

Route::post('/register', [Auth\RegisteredUserController::class, 'store'])->middleware('throttle:10,15');
