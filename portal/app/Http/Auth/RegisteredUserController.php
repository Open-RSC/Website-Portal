<?php

namespace App\Http\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use function App\Helpers\add_characters;


class RegisteredUserController
    extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{

    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse {
        $validator = Validator::make($request->all(), [
                'username' => ['bail', 'regex:/^([-a-z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                ],
                'db' => ['required', Rule::in(['preservation','cabbage','2001scape','coleslaw','uranium','openpk'])],
                'password' => 'required|min:4|max:20',
            ])->validate();
            $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $request->input('username')));
            if (DB::connection($request->input('db'))->table('players')->where('email', '=', $request->input('email'))->exists()) {
                throw ValidationException::withMessages([
                'email' => [trans('The email address is already in use.')],
                ], $validator);
            }
            if (DB::connection($request->input('db'))->table('players')->where('username', '=', $trimmed_username)->exists()) {
                throw ValidationException::withMessages([
                'email' => [trans('The username is already in use.')],
                ], $validator);
            }
        event(new Registered($user = $creator->create($request->all())));
        return app(RegisterResponse::class);
    }

}