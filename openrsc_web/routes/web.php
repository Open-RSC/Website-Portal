<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// General pages
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
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
Route::get('/player/{subpage}/bank', 'PlayerController@bank')->middleware('is_admin')->name('bank');
Route::get('/player/{subpage}/inventory', 'PlayerController@invitem')->middleware('is_admin')->name('invitem');

// Item lookup
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/itemdef/{id}', 'ItemController@show')->name('itemdef');

// NPC lookup
Route::get('/npcs', 'NpcController@index')->name('npcs');
Route::get('/npcdef/{id}', 'NpcController@show')->name('npcdef');

// Highscores
Route::get('/highscores', 'HighscoresController@index')->name('highscores');
Route::get('/highscores/skill_total', 'HighscoresController@index')->name('highscores');
Route::get('/highscores/{subpage}', 'HighscoresController@show')->name('highscorestat');

// Afman staff zone
Route::get('/chat_logs', 'StaffController@chat_logs')->middleware('is_admin')->name('chat_logs');
Route::get('/pm_logs', 'StaffController@pm_logs')->middleware('is_admin')->name('pm_logs');
Route::get('/trade_logs', 'StaffController@trade_logs')->middleware('is_admin')->name('trade_logs');
Route::get('/generic_logs', 'StaffController@generic_logs')->middleware('is_admin')->name('generic_logs');
Route::get('/shop_logs', 'StaffController@shop_logs')->middleware('is_admin')->name('shop_logs');
Route::get('/auction_logs', 'StaffController@auction_logs')->middleware('is_admin')->name('auction_logs');
Route::get('/live_feed_logs', 'StaffController@live_feed_logs')->middleware('is_admin')->name('live_feed_logs');
Route::get('/player_cache_logs', 'StaffController@player_cache_logs')->middleware('is_admin')->name('player_cache_logs');
Route::get('/report_logs', 'StaffController@report_logs')->middleware('is_admin')->name('report_logs');
Route::get('/staff_logs', 'StaffController@staff_logs')->middleware('is_admin')->name('staff_logs');
