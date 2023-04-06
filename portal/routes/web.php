<?php

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
Route::get('/', 'HomeController@home')->name('Home');
Route::get('/home', 'HomeController@home')->name('Home Page');
Route::get('worldmap/{db}', 'HomeController@worldmap')->name('World Map');
Route::get('wilderness', 'HomeController@wilderness')->name('Wilderness Map');
Route::get('rules', 'HomeController@rules')->name('Rules and Security');
Route::get('online', 'StatsController@online')->name('Online list');
Route::get('createdtoday', 'StatsController@createdtoday')->name('Players Created Today');
Route::get('logins48', 'StatsController@logins48')->name('Logins in the last 48 hours');
Route::get('stats/{db}/overview', 'StatsController@stats')->name('StatisticsOverview')->middleware('auth');
Route::get('stats/{id}/detail', 'StatsController@statsDetail')->name('StatisticsDetail')->middleware('auth');
Route::get('stats', 'StatsController@redirectToStats')->name('StatisticsRedirect')->middleware('auth');
Route::get('stats/list', 'StatsController@redirectToStatsList')->name('StatisticsListRedirect')->middleware('auth');
Route::get('stats/{db}/list', 'StatsController@statsList')->name('StatisticsList')->middleware('auth');
Route::get('stats/{db}/data', 'StatsController@statsData')->name('StatisticsData')->middleware('auth');
Route::get('faq', 'HomeController@faq')->name('Frequently Asked Questions');
Route::get('terms', 'HomeController@faq')->name('Terms and Conditions');
Route::get('privacy', 'HomeController@faq')->name('Privacy Policy');
Route::get('playnow', 'HomeController@playnow')->name('Play RuneScape '); // purposely left with a space to deconflict
Route::get('playnow/worldlist', 'HomeController@worldlist')->name('World List');
Route::get('play/{game}/{members}', 'HomeController@play')->name('Play RuneScape');

// Quest pages
Route::get('quests', 'QuestController@index')->name('Quests');
Route::get('quest/{subpage}', 'QuestController@show')->name('{subpage}}');
Route::get('minigames', 'QuestController@minigames')->name('Mini Games');

// Player pages
Route::get('player/{db}/{subpage}', 'PlayerController@index')->name('Player');
//Route::get('player/{db}/shar/bank', 'PlayerController@shar')->name('sharbank');
Route::get('player/{db}/{subpage}/bank', 'PlayerController@bank')->middleware('auth:api')->name('Bank');
Route::get('player/{db}/{subpage}/inventory', 'PlayerController@invitem')->middleware('auth:api')->name('Inventory Items');
Route::get('playerexport/', 'PlayerController@exportView')->name('PlayerExportView');
Route::get('playerexportinstructions/', 'PlayerController@exportInstructions')->name('PlayerExportInstructions');
Route::post('playerexport/export/', 'PlayerController@exportSubmit')->middleware(['throttle:15,20'])->name('PlayerExportSubmit');

// Item lookup
Route::any('items', 'ItemController@index')->name('Items');
Route::any('itemdef/{id}', 'ItemController@show')->name('Item Information');

// NPC lookup
Route::any('npcs', 'NpcController@index')->name('Monster Database');
Route::any('npcdef/{id}', 'NpcController@show')->name('Monster Details');

// Client launcher online world lookup
Route::get('onlinelookup', 'StatsController@onlinelookup');

// Hiscores
Route::any('hiscores/{db}', 'HiscoresController@index')->name('RuneScape Hiscores');
Route::any('hiscores/{db}/skill_total', 'HiscoresController@index')->name('RuneScape Hiscores '); // purposely left with a space to deconflict
Route::any('hiscores/{db}/{subpage}', 'HiscoresController@show');
Route::any('hiscores/{db}/{subpage}/{iron_man}', 'HiscoresController@iron_man')->name('RuneScape Ironman Hiscores');
Route::post('searchByName', 'HiscoresController@searchByName');
Route::any('toplist/{db}', 'HiscoresController@toplist')->name('RuneScape Hiscore tables'); // purposely left with a space to deconflict


// Current players
//Route::any('onlinelist/{db}', 'OnlineController@index')->name('Current RuneScape players');

// Afman staff zone
Route::get('staff/{db}/login_list', 'StaffController@login_list')->middleware('auth')->name('login_list');
Route::get('staff/{db}/login_list/data', 'StaffController@loginListData')->middleware('auth')->name('LoginListData');
Route::get('staff/{db}/player_list', 'StaffController@player_list')->middleware('auth')->name('player_list');
Route::get('staff/{db}/player_list/data', 'StaffController@playerListData')->middleware('auth')->name('PlayerListData');
Route::get('staff/{db}/player/{id}/detail', 'StaffController@player_view')->middleware('auth')->name('player_view');
Route::get('staff/{db}/chat_logs', 'StaffController@chat_logs')->middleware('auth')->name('chat_logs');
Route::get('staff/{db}/chat_logs/data', 'StaffController@chatLogsData')->middleware('auth')->name('ChatLogsData');
Route::get('staff/{db}/globalchat_logs', 'StaffController@globalchat_logs')->middleware('auth')->name('globalchat_logs');
Route::get('staff/{db}/globalchat_logs/data', 'StaffController@globalChatLogsData')->middleware('auth')->name('GlobalChatLogsData');
Route::get('staff/{db}/pm_logs', 'StaffController@pm_logs')->middleware('auth')->name('pm_logs');
Route::get('staff/{db}/pm_logs/data', 'StaffController@pmLogsData')->middleware('auth')->name('PmLogsData');
Route::get('staff/{db}/trade_logs', 'StaffController@trade_logs')->middleware('auth')->name('trade_logs');
Route::get('staff/{db}/trade_logs/data', 'StaffController@tradeLogsData')->middleware('auth')->name('TradeLogsData');
Route::get('staff/{db}/generic_logs', 'StaffController@generic_logs')->middleware('auth')->name('generic_logs');
Route::get('staff/{db}/generic_logs/data', 'StaffController@genericLogsData')->middleware('auth')->name('GenericLogsData');
Route::get('staff/{db}/auction_logs', 'StaffController@auction_logs')->middleware('auth')->name('auction_logs');
Route::get('staff/{db}/auction_logs/data', 'StaffController@auctionLogsData')->middleware('auth')->name('AuctionLogsData');
Route::get('staff/{db}/live_feed_logs', 'StaffController@live_feed_logs')->middleware('auth')->name('live_feed_logs');
Route::get('staff/{db}/player_cache_logs', 'StaffController@player_cache_logs')->middleware('auth')->name('player_cache_logs');
Route::get('staff/{db}/report_logs', 'StaffController@report_logs')->middleware('auth')->name('report_logs');
Route::get('staff/{db}/rename_logs', 'StaffController@rename_logs')->middleware('auth')->name('rename_logs');
Route::get('staff/{db}/rename_logs/data', 'StaffController@renameLogsData')->middleware('auth')->name('RenameLogsData');
Route::get('staff/{db}/staff_logs', 'StaffController@staff_logs')->middleware('auth')->name('staff_logs');
Route::get('staff/{db}/staff_logs/data', 'StaffController@staffLogsData')->middleware('auth')->name('StaffLogsData');

//Route::get('register', 'Livewire\Registration')->name('Player Registration');
//Route::post('register', 'Livewire\Registration')->middleware(['honey', 'honey-recaptcha']);

/*Route::any('login', 'Livewire\Login')->name('Secure_Login');
Route::post('login', 'Livewire\Login')->middleware(['honey', 'honey-recaptcha']);
Route::post('logout', 'Livewire\Login@logout')->name('Logout');*/

Route::post('/register', 'Auth\RegisteredUserController@store')->middleware('throttle:5,10');