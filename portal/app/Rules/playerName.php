<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use JetBrains\PhpStorm\Pure;

class playerName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function usernameToHash($s): int
    {
        $s = strtolower($s);
        $s1 = '';
        for ($i = 0; $i < strlen($s); $i++) {
            $c = $s[$i];
            if ($c >= 'a' && $c <= 'z')
                $s1 = $s1 . $c;
            else if ($c >= '0' && $c <= '9')
                $s1 = $s1 . $c;
            else
                $s1 = $s1 . ' ';
        }
        $s1 = trim($s1);
        if (strlen($s1) > 12)
            $s1 = substring($s1, 0, 12);
        $l = 0;
        for ($j = 0; $j < strlen($s1); $j++) {
            $c1 = $s1[$j];
            $l *= 37;
            if ($c1 >= 'a' && $c1 <= 'z')
                $l += (1 + ord($c1)) - 97;
            else if ($c1 >= '0' && $c1 <= '9')
                $l += (27 + ord($c1)) - 48;
        }
        return $l;
    }

    public function hashToUsername($l): string
    {
        if ($l < 0)
            return 'invalid_name';
        $s = '';
        while ($l != 0) {
            $i = floor(floatval($l % 37));
            $l = floor(floatval($l / 37));
            if ($i == 0)
                $s = ' ' . $s;
            else if ($i < 27) {
                if ($l % 37 == 0)
                    $s = chr(($i + 65) - 1) . $s;
                else
                    $s = chr(($i + 97) - 1) . $s;
            } else {
                $s = chr(($i + 48) - 27) . $s;
            }
        }
        return $s;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //return $this->usernameToHash($value) === $this->hashToUsername($value);
        return '1=1';

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Someone else has registered that username.';
    }
}
