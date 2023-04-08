<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
            'username' => ['bail', 'regex:/^([-a-z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'db' => ['required', Rule::in(['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'])],
            'password' => 'required|min:4|max:20',
        ])->validate();
        
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $input['username']));
        
        if (DB::connection($input['db'])->table('players')->where('username', '=', $trimmed_username)->exists()) {
            throw ValidationException::withMessages([
                'email' => [trans('The username is already in use.')],
            ]);
        }
    }
}