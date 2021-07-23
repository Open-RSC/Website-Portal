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
Route::get('worldmap', 'HomeController@worldmap')->name('World Map');
Route::get('wilderness', 'HomeController@wilderness')->name('Wilderness Map');
Route::get('rules', 'HomeController@rules')->name('Rules and Security');
Route::get('online', 'StatsController@online')->name('Online list');
Route::get('createdtoday', 'StatsController@createdtoday')->name('Players Created Today');
Route::get('logins48', 'StatsController@logins48')->name('Logins in the last 48 hours');
Route::get('stats', 'StatsController@stats')->name('Statistics');

Route::get('faq', 'HomeController@faq')->name('Frequently Asked Questions');
Route::get('terms', 'HomeController@faq')->name('Terms and Conditions');
Route::get('privacy', 'HomeController@faq')->name('Privacy Policy');

// Quest pages
Route::get('quest_list', 'QuestController@index')->name('Quests');
Route::get('quest/{subpage}', 'QuestController@show')->name('Quest');
Route::get('minigame_list', 'QuestController@minigame_list')->name('Mini Games');

// Player pages
Route::get('player/{db}/{subpage}', 'PlayerController@index')->name('Player');
//Route::get('player/{db}/shar/bank', 'PlayerController@shar')->name('sharbank');
Route::get('player/{db}/{subpage}/bank', 'PlayerController@bank')->middleware('auth:api')->name('Bank');
Route::get('player/{db}/{subpage}/inventory', 'PlayerController@invitem')->middleware('auth:api')->name('Inventory Items');

// Item lookup
Route::any('items', 'ItemController@index')->name('Items');
Route::any('itemdef/{id}', 'ItemController@show')->name('Item Information');

// NPC lookup
Route::any('npcs', 'NpcController@index')->name('Monster Database');
Route::any('npcdef/{id}', 'NpcController@show')->name('Monster Details');

// Hiscores
Route::any('hiscores/{db}', 'HiscoresController@index')->name('RuneScape Hiscores');
Route::any('/hiscores/{db}/skill_total', 'HiscoresController@index')->name('RuneScape Hiscores '); // purposely left with a space to deconflict
Route::any('/hiscores/{db}/{subpage}', 'HiscoresController@show');
Route::any('/hiscores/{db}/{subpage}/{iron_man}', 'HiscoresController@iron_man');

// Afman staff zone
/*
Route::get('chat_logs', 'StaffController@chat_logs')->middleware('auth')->name('chat_logs');
Route::get('pm_logs', 'StaffController@pm_logs')->middleware('auth')->name('pm_logs');
Route::get('trade_logs', 'StaffController@trade_logs')->middleware('auth')->name('trade_logs');
Route::get('generic_logs', 'StaffController@generic_logs')->middleware('auth')->name('generic_logs');
Route::get('shop_logs', 'StaffController@shop_logs')->middleware('auth')->name('shop_logs');
Route::get('auction_logs', 'StaffController@auction_logs')->middleware('auth')->name('auction_logs');
Route::get('live_feed_logs', 'StaffController@live_feed_logs')->middleware('auth')->name('live_feed_logs');
Route::get('player_cache_logs', 'StaffController@player_cache_logs')->middleware('auth')->name('player_cache_logs');
Route::get('report_logs', 'StaffController@report_logs')->middleware('auth')->name('report_logs');
Route::get('staff_logs', 'StaffController@staff_logs')->middleware('auth')->name('staff_logs');
*/

Route::get('register', 'Livewire\Registration')->name('Player Registration');
Route::post('register', 'Livewire\Registration')->middleware(['honey', 'honey-recaptcha']);

/*
Route::any('login', 'Livewire\Login')->name('Secure_Login');
Route::post('login', 'Livewire\Login')->middleware(['honey', 'honey-recaptcha']);
Route::post('logout', 'Livewire\Login@logout')->name('Logout');
*/
