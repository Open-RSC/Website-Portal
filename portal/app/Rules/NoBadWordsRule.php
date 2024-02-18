<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class NoBadWordsRule implements ValidationRule
{
    // Banned words using 13 rotations
    protected array $badWords = ['nff', 'shpx', 'fuvg', 'fu1g', 'fhpx', 'cravf', 'intbb', 'inttvan', 'intvan', 'chffl', 'juber', 'fyhg', 'crrabe', 'crra0e', 'c33a', 'c33a0e', 'qvpx', 'p0px', 'pbpx', 'phag', 'zbq', 'z0q', 'zbqrengbe', 'nqzva', 'nqz1a', 'nqzvavfgengbe', 'nszna', 'wntrk', 'wnin', 'cuhpx', 'shx', 'shk', 'shd', 'snd', 'sbp', 'sbx', 'sbbx', 'srx', 'snpx', 'sbrx', 'srpx', 'sphx', 'shxp', 'spx', 'shvpx', 'suhpx', 'cuhx', 'puvg', 'fpuvg', 'fuwg', 'fung', 'furg', 'fvug', 'fugv', 'fug', 'penc', 'ovgpu', 'owgpu', '13vgpu', 'ovpu', 'ovngpu', 'ovbgpu', 'onfgneq', 'fcnfgvp', 'ergneq', 'a1tn', 'a1te', 'avtn', 'avte', 'avtre', 'puvax', 'jbc', 'pbba', 'fgnyva', 'uvgyre', 'anmv', 'dhrre', 'xjrre', 'snt', 'sntbg', 'yrfob', 'oryyraq', 'travgny', 'qvx', 'jnat', 'fuybat', 'pbx', 'cevp', 'jvyyl', 'obare', 'rerpg', 'rerpgvba', 'onyf', 'obyybpx', 'grfgvpyr', 'fpebghz', 'ahgf', 'pyvg', 'fyvg', 'inqtr', 'snaal', 'gjng', 'chfl', 'chfv', 'chff', 'oernfg', 'gvg', 'gvgf', 'obbo', 'avcyr', 'nefr', 'genaftraqre', 'genafftraqre', 'genal', 'genal', 'genavr', 'genaavr', 'genaal', 'cbb', 'cbbc', 'nahf', 'erpghz', 'nany', 'ohgg', 'nffubyr', 'nffu01r', 'hevangr', 'cvff', 'hevar', 'gheq', 'snrprf', 'rkperzrag', 'rkpergr', 'sneg', 'pnpx', 'fcrez', 'phz', 'fchax', 'fzrt', 'frzra', 'rwnphyng', 'encr', 'encvfg', 'fgnyx', 'jnax', 'znfgheongr', 'znfgreongvat', 'cvzc', 'cebfgvghg', 'crqb', 'crqbcuvyr', 'cnrqb', 'cnrqbcuvyr', 'fyncre', 'fynt', 'yvpx', 'oybwbo', 'sryng', 'phavyvat', 'anxrq', 'haqerff', 'ahqr', 'pbaqbz', 'qvyqb', 'ivoengbe', 'obaqntr', 'fcnax', 'ubeal', 'guebo', 'gnzcba', 'oybbqent', 'cnagl', 'cbea', 'cnfjbeq', 'cnff', 'cjbeq', 'fvrnt urvy', 'fvrt urvy', 'snx', 'snpxvat', 'fperj', 'avttn', 'zbqehar', 'nubyr', 'arteb', 'ywpx', 'qwpx', 'gwgf', 'ubeavr', 'zhfgreongr', 'avtt', 'aytt', 'a1tt', 'qrrm', 'q33m'];

    // Exact match banned words using 13 rotations
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
            if (Str::contains(strtolower($value), str_rot13($badWord))) {
                $fail("The :attribute contains banned words.");
            }
        }
         foreach ($this->exactMatchBadWords as $badWord) {
            if (strtolower($value) === str_rot13($badWord)) {
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
