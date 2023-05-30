<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class NoBadWordsRule implements ValidationRule
{
    // Banned words
    protected array $badWords = ['ass', 'fuck', 'shit', 'suck', 'penis', 'vagina', 'pussy', 'whore', 'slut', 'penis', 'dick',
         'cock', 'cunt', 'mod', 'm0d', 'moderator', 'admin', 'adm1n', 'administrator', 'afman', 'jagex', 'java'];
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
     * @param  mixed  $value
     * @param Closure $fail
     * @return void
     */

     public function validate(string $attribute, mixed $value, Closure $fail): void
     {
         foreach ($this->badWords as $badWord) {
            if (Str::contains(strtolower($value), $badWord)) {
                $fail("The :attribute contains banned words.");
            }
        }
     }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'That word is not allowed.';
    }
}
