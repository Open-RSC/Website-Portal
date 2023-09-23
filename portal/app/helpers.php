<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

if (!function_exists('passwd_compat_hasher')) {
    /**
     * Returns the sha512 hash for a legacy password
     *
     *
     * @param  string  $salt the salt used for legacy hasher
     * @return string the corresponding bcrypt string
     */
    function passwd_compat_hasher(string $credential, string $salt): string
    {
        return hash('sha512', ($salt.md5($credential)));
    }
}

if (!function_exists('password_needs_rehashing')) {
    /**
     * @param $passwordHashed string The password hash
     */
    function password_needs_rehashing(string $passwordHashed): bool
    {
        return ! str_starts_with($passwordHashed, '$2y$10$');
    }
}

if (!function_exists('add_characters')) {
    function add_characters($s, $i)
    {
        $s1 = '';
        for ($j = 0; $j < $i; $j++) {
            if ($j >= strlen($s)) {
                $s1 .= ' ';
            } else {
                $c = $s[$j];
                $s1 .= ctype_alnum($c) ? $c : '_';
            }
        }

        return $s1;
    }
}

if (!function_exists('get_client_ip_address')) {
    function get_client_ip_address()
    {
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $clientIp = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $clientIp = $forward;
        } else {
            $clientIp = $remote;
        }

        return $clientIp;
    }
}

if (!function_exists('player_is_online')) {
    function player_is_online($db, $username)
    {
        $player = DB::connection($db)
            ->table('players')
            ->select('*')
            ->where('username', '=', $username)
            ->first();

        return $player !== null && ((int) $player->online) === 1;
    }
}

if (!function_exists('is_incorrect_production_url')) {
    function is_incorrect_production_url()
    {
        return (config('app.env') === 'production' && url('/') !== config('app.url'));
    }
}

if (!function_exists('ucworlds')) {
    function uc_worlds($db) {
        if ($db === "openpk") {
            return "OpenPK";
        }
        return ucwords($db);
    }
}

if (!function_exists('is_json')) {
    function is_json($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
