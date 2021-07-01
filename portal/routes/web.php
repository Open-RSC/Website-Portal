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
Route::get('/worldmap', 'HomeController@worldmap')->name('World_Map');
Route::get('/wilderness', 'HomeController@wilderness')->name('Wilderness_Map');
Route::get('/faq', 'HomeController@faq')->name('Frequently_Asked_Questions');
Route::get('/rules', 'HomeController@rules')->name('Rules_and_Security');
Route::get('/online', 'StatsController@online')->name('online');
Route::get('/createdtoday', 'StatsController@createdtoday')->name('createdtoday');
Route::get('/logins48', 'StatsController@logins48')->name('logins48');
Route::get('/stats', 'StatsController@stats')->name('stats');
Route::get('/terms', 'HomeController@faq')->name('Terms_and_Conditions');
Route::get('/privacy', 'HomeController@faq')->name('Privacy_Policy');

// Quest pages
Route::get('/quest_list', 'QuestController@index')->name('quest_list');
Route::get('/quest/{subpage}', 'QuestController@show')->name('quest');
Route::get('/minigame_list', 'QuestController@minigame_list')->name('minigame_list');

// Player pages
Route::get('/player/{subpage}', 'PlayerController@index')->name('player');
Route::get('/player/shar/bank', 'PlayerController@shar')->name('sharbank');
Route::get('/player/{subpage}/bank', 'PlayerController@bank')->middleware('auth:api')->name('bank');
Route::get('/player/{subpage}/inventory', 'PlayerController@invitem')->middleware('auth:api')->name('invitem');

// Item lookup
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');

// NPC lookup
Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

// Hiscores
Route::get('/hiscores', 'HiscoresController@index');
Route::get('/hiscores/skill_total', 'HiscoresController@index')->name('RuneScape Hiscores');
Route::get('/hiscores/{subpage}', 'HiscoresController@show');

// Afman staff zone
Route::get('/chat_logs', 'StaffController@chat_logs')->middleware('auth')->name('chat_logs');
Route::get('/pm_logs', 'StaffController@pm_logs')->middleware('auth')->name('pm_logs');
Route::get('/trade_logs', 'StaffController@trade_logs')->middleware('auth')->name('trade_logs');
Route::get('/generic_logs', 'StaffController@generic_logs')->middleware('auth')->name('generic_logs');
Route::get('/shop_logs', 'StaffController@shop_logs')->middleware('auth')->name('shop_logs');
Route::get('/auction_logs', 'StaffController@auction_logs')->middleware('auth')->name('auction_logs');
Route::get('/live_feed_logs', 'StaffController@live_feed_logs')->middleware('auth')->name('live_feed_logs');
Route::get('/player_cache_logs', 'StaffController@player_cache_logs')->middleware('auth')->name('player_cache_logs');
Route::get('/report_logs', 'StaffController@report_logs')->middleware('auth')->name('report_logs');
Route::get('/staff_logs', 'StaffController@staff_logs')->middleware('auth')->name('staff_logs');

Route::get('/register', 'Livewire\Registration')->name('Player_Registration');
Route::post('/register', 'Livewire\Registration')->middleware(['honey', 'honey-recaptcha']);

Route::any('/login', 'Livewire\Login')->name('Secure_Login');
Route::post('/login', 'Livewire\Login')->middleware(['honey', 'honey-recaptcha']);
Route::post('/logout', 'Livewire\Login@logout')->name('Logout');

