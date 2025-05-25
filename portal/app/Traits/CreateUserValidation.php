<?php

namespace App\Traits;

use App\Models\Setting;
use App\Rules\NoBadWordsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

use function App\Helpers\get_client_ip_address;

trait CreateUserValidation
{
    protected function validateCreateUserRequest(Request $request)
    {
        $input = $request->all();
        $this->validateCreateUserInput($input);
    }

    protected function validateCreateUserInput(array $input)
    {
        //We could add a custom captcha in here if we wanted.
        $rules = [
            'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12', new NoBadWordsRule],
            'email' => ['required', 'string', 'email', 'max:255'],
            'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
            'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20', 'confirmed'],
            'agree_to_rules' => ['required', 'accepted'],
        ];
        $inviteOnly = (Setting::where('key', 'invite_only_registration')->value('value') === '1') ?? false;
        //Conditionally add invite code rules based on system configuration
        if ($inviteOnly) {
            $rules['invite_code'] = ['required', 'string', 'exists:invite_codes,code,used,false'];
        }

        $validator = Validator::make($input, $rules);
        $domain = parse_url(config('app.url'), PHP_URL_HOST); //For example: rsc.vet

        if (!empty($input['email']) && str_ends_with(strtolower($input['email']), '@' . strtolower($domain))) {
            throw ValidationException::withMessages([
                'email' => ['Registration using this email domain is not allowed.'],
            ]);
        }
        $validator->validate();
        $db = $input['db'];
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $input['username']));

        if (DB::connection($db)->table('players')->where(DB::raw('LOWER(username)'), '=', strtolower($trimmed_username))->exists()) {
            throw ValidationException::withMessages([
                'username' => [trans('The username is already in use.')],
            ]);
        }

        //Check if the username has already been badnamed
        $formerBadNameExists = DB::connection($db)->table('former_names')
            ->where(DB::raw('LOWER(formerName)'), '=', strtolower($trimmed_username))
            ->where('changeType', '=', 1)
            ->exists();

        if ($formerBadNameExists) {
            throw ValidationException::withMessages([
                'username' => [trans('This username cannot be used.')],
            ]);
        }

        //Check if the user already has too many accounts
        $recentAccounts = DB::connection($db)->table('players')
            ->where('creation_ip', '=', get_client_ip_address())
            ->where('creation_date', '>=', time() - 86400)
            ->count();

        if ($recentAccounts >= config('openrsc.max_new_accounts_per_24_hours_'.$db)) {
            throw ValidationException::withMessages([
                'throttle' => [trans('You have created too many accounts in the past 24 hours.')],
            ]);
        }
    }
}
