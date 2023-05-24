<?php

namespace App\Traits;

use Carbon\Carbon;
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
        Validator::make($input, [
            'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
            'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20', 'confirmed'], 
        ])->validate();
        
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $input['username']));
        
        if (DB::connection($input['db'])->table('players')->where(DB::raw('LOWER(username)'), '=', strtolower($trimmed_username))->exists()) {
            throw ValidationException::withMessages([
                'username' => [trans('The username is already in use.')],
            ]);
        }
        
        $recentAccounts = DB::connection($input['db'])->table('players')
        ->where('creation_ip', '=', get_client_ip_address())
        ->where('creation_date', '>=', time() - 86400)
        ->count();
        
        if ($recentAccounts >= config('openrsc.max_new_accounts_per_24_hours')) {
            throw ValidationException::withMessages([
                'throttle' => [trans('You have created too many accounts in the past 24 hours.')],
            ]);
        }
        
    }
}