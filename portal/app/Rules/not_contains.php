<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use JetBrains\PhpStorm\Pure;

class not_contains implements Rule
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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @return bool
     */
    #[Pure]
 public function passes(string $attribute, mixed $value): bool
 {
     // Banned words
     $words = ['ass', 'fuck', 'shit', 'suck', 'penis', 'vagina', 'pussy', 'whore', 'slut', 'penis', 'dick',
         'cock', 'cunt', 'mod', 'm0d', 'moderator', 'admin', 'adm1n', 'administrator', 'afman', 'jagex', 'java'];
     foreach ($words as $word) {
         if (stripos($value, $word) !== false) {
             return false;
         }
     }

     return true;
 }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'That word is not allowed.';
    }
}
