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
Route::get('/', 'HomeController@index')->name('root');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/worldmap', 'HomeController@worldmap')->name('worldmap');
Route::get('/wilderness', 'HomeController@wilderness')->name('wilderness');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/rules', 'HomeController@rules')->name('rules');
Route::get('/online', 'HomeController@online')->name('online');
Route::get('/createdtoday', 'HomeController@createdtoday')->name('createdtoday');
Route::get('/logins48', 'HomeController@logins48')->name('logins48');
Route::get('/stats', 'HomeController@stats')->name('stats');

// Quest pages
Route::get('/quest_list', 'QuestController@index')->name('quest_list');
Route::get('/quest/{subpage}', 'QuestController@show')->name('quest');
Route::get('/minigame_list', 'QuestController@minigame_list')->name('minigame_list');

// Player pages
Route::get('/player/{subpage}', 'PlayerController@index')->name('player');
Route::get('/player/shar/bank', 'PlayerController@shar')->name('bank');
Route::get('/player/{subpage}/bank', 'PlayerController@bank')->middleware('auth:api')->name('bank');
Route::get('/player/{subpage}/inventory', 'PlayerController@invitem')->middleware('auth:api')->name('invitem');

// Item lookup
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');

// NPC lookup
Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

// Highscores
Route::get('/highscores', 'HighscoresController@index')->name('highscores');
Route::get('/highscores/skill_total', 'HighscoresController@index')->name('skill_total');
Route::get('/highscores/{subpage}', 'HighscoresController@show')->name('highscorestat');

// Afman staff zone
Route::get('/chat_logs', 'StaffController@chat_logs')->middleware('auth:api')->name('chat_logs');
Route::get('/pm_logs', 'StaffController@pm_logs')->middleware('auth:api')->name('pm_logs');
Route::get('/trade_logs', 'StaffController@trade_logs')->middleware('auth:api')->name('trade_logs');
Route::get('/generic_logs', 'StaffController@generic_logs')->middleware('auth:api')->name('generic_logs');
Route::get('/shop_logs', 'StaffController@shop_logs')->middleware('auth:api')->name('shop_logs');
Route::get('/auction_logs', 'StaffController@auction_logs')->middleware('auth:api')->name('auction_logs');
Route::get('/live_feed_logs', 'StaffController@live_feed_logs')->middleware('auth:api')->name('live_feed_logs');
Route::get('/player_cache_logs', 'StaffController@player_cache_logs')->middleware('auth:api')->name('player_cache_logs');
Route::get('/report_logs', 'StaffController@report_logs')->middleware('auth:api')->name('report_logs');
Route::get('/staff_logs', 'StaffController@staff_logs')->middleware('auth:api')->name('staff_logs');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
