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
}