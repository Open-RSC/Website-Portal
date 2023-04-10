<?php

namespace App\Http\Auth;

use App\Traits\CreateUserValidation;
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
    use CreateUserValidation;
    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse {
        if (!config("openrsc.web_registration_enabled")) {
            return app(RegisterResponse::class);
        }
        $this->validateCreateUserRequest($request);
        event(new Registered($user = $creator->create($request->all())));
        return app(RegisterResponse::class);
    }

}