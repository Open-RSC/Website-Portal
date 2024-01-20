<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class NoBadWordsRule implements ValidationRule
{
    // Banned words
    protected array $badWords = ['ass', 'fuck', 'shit', 'suck', 'penis', 'vagina', 'pussy', 'whore', 'slut', 'dick', 'cock', 'cunt', 'mod', 'm0d', 'moderator', 'admin', 'adm1n', 'administrator', 'afman', 'jagex', 'java', 'phuck', 'fuk', 'fux', 'fuq', 'faq', 'foc', 'fok', 'fook', 'fek', 'fack', 'foek', 'feck', 'fcuk', 'fukc', 'fck', 'fuick', 'fhuck', 'phuk', 'chit', 'schit', 'shjt', 'shat', 'shet', 'siht', 'shti', 'sht', 'crap', 'bitch', 'bjtch', '13itch', 'bich', 'biatch', 'biotch', 'bastard', 'spastic', 'retard', 'niga', 'nigr', 'niger', 'chink', 'wop', 'coon', 'hitler', 'nazi', 'queer', 'kweer', 'fag', 'fagot', 'lesbo', 'bellend', 'genital', 'dik', 'wang', 'shlong', 'cok', 'pric', 'willy', 'boner', 'erection', 'bals', 'bollock', 'testicle', 'scrotum', 'nuts', 'clit', 'slit', 'vadge', 'fanny', 'twat', 'pusy', 'pusi', 'puss', 'breast', 'tit', 'tits', 'boob', 'niple', 'arse', 'trany', 'tranie', 'trannie', 'tranny', 'poo', 'poop', 'anus', 'rectum', 'anal', 'butt', 'asshole', 'assh01e', 'urinate', 'piss', 'urine', 'turd', 'faeces', 'excrement', 'excrete', 'fart', 'cack', 'sperm', 'cum', 'spunk', 'smeg', 'semen', 'ejaculat', 'rape', 'rapist', 'stalk', 'wank', 'masturbate', 'masterbating', 'pimp', 'prostitut', 'pedophile', 'paedophile', 'slaper', 'slag', 'lick', 'blojob', 'felat', 'cuniling', 'naked', 'undress', 'nude', 'condom', 'dildo', 'vibrator', 'bondage', 'spank', 'horny', 'throb', 'tampon', 'bloodrag', 'panty', 'porn', 'pasword', 'pass', 'pword', 'sieag heil', 'sieg heil', 'fak', 'facking', 'screw', 'nigga', 'modrune', 'ahole', 'negro', 'ljck', 'djck', 'tjts', 'hornie', 'musterbate', 'nigg'];
    protected array $exactMatchBadWords = [];
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
         foreach ($this->exactMatchBadWords as $badWord) {
            if (strtolower($value) === $badWord) {
                $fail("The :attribute has a banned word.");
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
