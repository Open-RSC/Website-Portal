<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class NoBadWordsRule implements ValidationRule
{
    // Banned words using 13 rotations
    protected array $badWords = ['13vgpu', 'n d  c', 'n d c', 'nqz1a', 'nqzva', 'nqzvavfgengbe', 'nszna', 'nubyr', 'nany', 'naqerj gngr', 'nahf', 'nd c', 'ndc', 'nefr', 'nff', 'nffu01r', 'nffubyr', 'nheben', 'o d  c', 'o d c', 'o0are', 'onyf', 'onfgneq', 'oryyraq', 'ovngpu', 'ovpu', 'ovqra', 'ovrgpuf', 'ovyy pyvagba', 'ovbgpu', 'ovgpu', 'owgpu', 'oybwbo', 'oybbqent', 'obyybpx', 'obaqntr', 'obare', 'obbo', 'obbgl', 'oernfg', 'ohxxnxr', 'ohgg', 'ohgg cyht', 'ohggcyht', 'p.h.z', 'p0px', 'pnpx', 'puvatpubat', 'puvax', 'puvg', 'pyvg', 'pbpnvar', 'pbpx', 'pbx', 'pbaqbz', 'pbba', 'penc', 'pelcgb', 'phpx', 'phz', 'phavyvat', 'phag', 'q33m', 'qrrm', 'qvpx', 'qvwpx', 'qvx', 'qvyqb', 'qwpx', 'qbanyq gehzc', 'rwnphyng', 'rerpg', 'rerpgvba', 'rkperzrag', 'rkpergr', 'snpx', 'snpxvat', 'snrprf', 'snt', 'snttbg', 'sntbg', 'snx', 'snaal', 'snd', 'sneg', 'sng junyr', 'spx', 'sphx', 'srpx', 'srx', 'sryng', 'srghf', 'stg', 'suhpx', 'sbp', 'sbrx', 'sbx', 'sbbx', 'sberfxva', 'serr cnyrfgvar', 'shpx', 'shpxgneq', 'shvpx', 'shx', 'shxp', 'shd', 'shk', 'tnat onat', 'tnatonat', 'travgny', 'tbg gur onyyf', 'unznf', 'uvgyre', 'ubbxre', 'ubeavr', 'ubeal', 'ulzra', 'v jnf zhgrq', 'vfvf', 'wntrk', 'wnin', 'wvunq', 'whatyrohaal', 'xnznyn', 'xarrtebj', 'xd c', 'xd crg', 'xjrre', 'ynql obl', 'ynqlobl', 'yrfob', 'yvogneq', 'yvpx', 'ywpx', 'z0q', 'znfgreongvat', 'znfgheongr', 'zvqqtrg', 'zvqtrg', 'zbq', 'zbqrengbe', 'zbqehar', 'zhfgreongr', 'a1tn', 'a1tt', 'a1te', 'anxrq', 'anmv', 'artre', 'arteb', 'atrtru', 'avt obar', 'avt obarf', 'avtn', 'avtne', 'avtre', 'avtt', 'avttn', 'avttnu', 'avttrne', 'avttrre', 'avttre', 'avtttre', 'avttttre', 'avttbe', 'avtthu', 'avtthe', 'avtyrg', 'avte', 'avten', 'avcyr', 'avddre', 'aytre', 'aytt', 'ayttre', 'ahqr', 'ahgf', 'bcraefp', 'c33a', 'c33a0e', 'cnrqb', 'cnrqbcuvyr', 'cnagl', 'cnff', 'cnfjbeq', 'crqb', 'crqbcuvyr', 'crr crr', 'crra0e', 'crrabe', 'crrcrr', 'cravf', 'cunt', 'cuhpx', 'cuhx', 'cvzc', 'cvarzryba', 'cvff', 'cvffubyr', 'cbb', 'cbb cbb', 'cbbc', 'cbbcbb', 'cbepuzbaxrl', 'cbea', 'cbeauho', 'cbjregevccvat', 'cerfreingvba', 'cevp', 'cebfgvghg', 'cebfgvghgr', 'cebfgvghgvba', 'chppl', 'chu frr', 'chup', 'chufrr', 'chfv', 'chff', 'chffrr', 'chffvrf', 'chffl', 'chfl', 'chgva', 'cjbeq', 'dhrre', 'enturnq', 'enc1fg', 'encr', 'encre', 'encvat', 'encvfg', 'erpghz', 'erttva', 'ergneq', 'ergneqrq', 'ergneg', 'euncr', 'efp qnja', 'efp qlanfgl', 'efp rzh', 'efp eri', 'efp eribyhgvba', 'efp ina', 'efp inavyyn', 'efpq', 'efpqnja', 'efpqlanfgl', 'efprzh', 'efprzhyngvba', 'efpe', 'efperi', 'efpi', 'efpina', 'efpinavyyn', 'efcvfg', 'fnaqavttre', 'fpuvg', 'fperj', 'fpebghz', 'frzra', 'frk', 'frk7', 'fu1g', 'fung', 'fur znyr', 'furznyr', 'furg', 'fuvg', 'fuwg', 'fuybat', 'fug', 'fugv', 'fvrnt urvy', 'fvrt urvy', 'fvug', 'fynt', 'fyncre', 'fyvg', 'fybcrurnq', 'fyhg', 'fzrt', 'favttre', 'fbsggg', 'fcnax', 'fcnfgvp', 'fcrnepuhpxre', 'fcrez', 'fcvp', 'fchax', 'fgnyva', 'fgnyx', 'fhpx', 'fhvpvqny', 'fhvpvqr', 'gnvag', 'gnzcba', 'grfgvpyr', 'guebo', 'gvg', 'gvgf', 'gwgf', 'gbzjnat', 'genavr', 'genaavr', 'genaavrf', 'genaal', 'genaftraqre', 'genafftraqre', 'genafirfgvgr', 'genal', 'gehzc', 'gheq', 'gjng', 'haqerff', 'he fb fnq', 'hevangr', 'hevar', 'inqtr', 'inttvan', 'intvan', 'intbb', 'ivoengbe', 'ivetva', 'jnat', 'jnax', 'jnaxvat', 'jrrq', 'jryphz', 'junyr phz', 'junyrphz', 'juber', 'jvyyl', 'jbc', 'mvccreurnq'];

    // Exact match banned words using 13 rotations
    protected array $exactMatchBadWords = ['zbq'];

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
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($this->badWords as $badWord) {
            if (Str::contains(strtolower($value), str_rot13($badWord))) {
                $fail('The :attribute contains banned words.');
            }
        }
        foreach ($this->exactMatchBadWords as $badWord) {
            $rot13BadWord = str_rot13($badWord);
            if (strtolower($value) === str_rot13($badWord) || preg_match("/\b{$rot13BadWord}\b/", strtolower($value))) {
                $fail('The :attribute has a banned word.');
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
