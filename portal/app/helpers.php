<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

if (! function_exists('passwd_compat_hasher')) {
    /**
     * Returns the sha512 hash for a legacy password
     *
     *
     * @param  string  $salt  the salt used for legacy hasher
     * @return string the corresponding bcrypt string
     */
    function passwd_compat_hasher(string $credential, string $salt): string
    {
        return hash('sha512', ($salt.md5($credential)));
    }
}

if (! function_exists('password_needs_rehashing')) {
    /**
     * @param  $passwordHashed  string The password hash
     */
    function password_needs_rehashing(string $passwordHashed): bool
    {
        return ! str_starts_with($passwordHashed, '$2y$10$');
    }
}

if (! function_exists('add_characters')) {
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

if (! function_exists('get_client_ip_address')) {
    function get_client_ip_address()
    {
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];
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

if (! function_exists('player_is_online')) {
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

if (! function_exists('is_incorrect_production_url')) {
    function is_incorrect_production_url()
    {
        if (config('app.env') !== 'production') {
            return false;
        }

        $normalizeHost = function($url) {
            $host = parse_url($url, PHP_URL_HOST);
            if (str_starts_with($host, 'www.')) {
                $host = substr($host, 4); //Remove "www." from host
            }
            return $host;
        };

        return $normalizeHost(url('/')) !== $normalizeHost(config('app.url'));
    }
}

if (! function_exists('ucworlds')) {
    function uc_worlds($db)
    {
        if ($db === 'openpk') {
            return 'OpenPK';
        }

        return ucwords($db);
    }
}

if (! function_exists('is_json')) {
    function is_json($string)
    {
        json_decode($string);

        return json_last_error() == JSON_ERROR_NONE;
    }
}

if (! function_exists('get_date_from_msec')) {
    function get_date_from_msec($msec) {
        $seconds = floor($msec / 1000);
        $ss = $seconds % 60;
        $minutes = floor($seconds / 60);
        $mm = $minutes % 60;
        $hours = floor($minutes / 60);
        $hh = $hours % 24;
        $days = floor($hours / 24);

        return "{$days} days {$hh} hours {$mm} minutes {$ss} seconds";
    }
}

if (! function_exists('rot19')) {
    function rot19($string)
    {
        $result = '';
        foreach (str_split($string) as $char) {
            $ascii = ord($char);
            if ($ascii >= ord('a') && $ascii <= ord('z')) {
                $result .= chr((($ascii - ord('a') + 19) % 26) + ord('a'));
            } elseif ($ascii >= ord('A') && $ascii <= ord('Z')) {
                $result .= chr((($ascii - ord('A') + 19) % 26) + ord('A'));
            } else {
                $result .= $char;
            }
        }

        return $result;
    }
}

if (! function_exists('safe_json_encode')) {
    function safe_json_encode($data)
    {
        if (empty($data) || in_array($data, ['[]', '{}', 'null', 'NULL', ''])) {
            return null;
        }
        $encodedData = json_encode($data);
        if (in_array($encodedData, ['[]', '{}', '""', 'null', 'NULL'])) {
            return null;
        }

        return $encodedData;
    }
}

if (! function_exists('get_base_url')) {
    function get_base_url() {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $port = $_SERVER['SERVER_PORT'] ?? null;

        return $port && !in_array($port, [80, 443]) ? "$scheme://$host:$port" : "$scheme://$host";
    }
}
