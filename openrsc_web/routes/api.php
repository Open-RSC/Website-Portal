<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Commented out due to error "Unable to prepare route [api/user] for serialization. Uses Closure" when executing "php artisan optimize"
// Solution: https://github.com/laravel/framework/issues/22034#issuecomment-440911461

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
