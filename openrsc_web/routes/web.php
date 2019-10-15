<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// General pages
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Afman staff zone
Route::get('/staff_logs', 'StaffController@staff_logs')->middleware('is_admin')->name('staff_logs');
