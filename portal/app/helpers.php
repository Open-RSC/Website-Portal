<?php

namespace App\Helpers;

if (!function_exists('passwd_compat_hasher')) {
    /**
     * Returns the bcrypt hash for a legacy password
     *
     * @param string $credential
     *
     * @param string $salt the salt used for legacy hasher
     *
     * @return string the corresponding bcrypt string
     */
    function passwd_compat_hasher(string $credential, string $salt): string
    {
        return hash('sha512', ($salt . md5($credential)));

    }


    if (!function_exists('add_characters')) {
        function add_characters($s, $i)
        {
            $s1 = "";
            for ($j = 0; $j < $i; $j++) {
                if ($j >= strlen($s)) {
                    $s1 .= " ";
                } else {
                    $c = $s[$j];
                    $s1 .= ctype_alnum($c) ? $c : "_";
                }
            }
            return $s1;
        }
    }

    if (!function_exists('password_needs_rehashing')) {
        /**
         * @param $passwordHashed string The password hash
         * @return bool
         */
        function password_needs_rehashing(string $passwordHashed): bool
        {
            return !str_starts_with($passwordHashed, "$2y$10$");
        }

    }
}