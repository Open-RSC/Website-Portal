<?php

return [

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],

        'preservation' => [
            'driver' => 'session',
            'provider' => 'preservation',
        ],

        'cabbage' => [
            'driver' => 'session',
            'provider' => 'cabbage',
        ],

        'uranium' => [
            'driver' => 'session',
            'provider' => 'uranium',
        ],

        'coleslaw' => [
            'driver' => 'session',
            'provider' => 'coleslaw',
        ],

        'openpk' => [
            'driver' => 'session',
            'provider' => 'openpk',
        ],

        'retro' => [
            'driver' => 'session',
            'provider' => 'retro',
        ],

        '2001scape' => [
            'driver' => 'session',
            'provider' => '2001scape',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\players::class,
        ],

        'preservation' => [
            'driver' => 'eloquent',
            'model' => App\Models\preservation::class,
        ],

        'cabbage' => [
            'driver' => 'eloquent',
            'model' => App\Models\cabbage::class,
        ],

        'uranium' => [
            'driver' => 'eloquent',
            'model' => App\Models\uranium::class,
        ],

        'coleslaw' => [
            'driver' => 'eloquent',
            'model' => App\Models\coleslaw::class,
        ],

        'openpk' => [
            'driver' => 'eloquent',
            'model' => App\Models\openpk::class,
        ],

        '2001scape' => [
            'driver' => 'eloquent',
            'model' => App\Models\retro::class,
        ],

        'retro' => [
            'driver' => 'eloquent',
            'model' => App\Models\retro::class,
        ],
    ],

    'passwords' => [
        'user' => [
            'provider' => 'user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'preservation' => [
            'provider' => 'preservation',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'cabbage' => [
            'provider' => 'cabbage',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'uranium' => [
            'provider' => 'uranium',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'coleslaw' => [
            'provider' => 'coleslaw',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'openpk' => [
            'provider' => 'openpk',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        '2001scape' => [
            'provider' => '2001scape',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

];
