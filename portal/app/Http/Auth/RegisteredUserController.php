<?php

namespace App\Http\Auth;

use App\Traits\CreateUserValidation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisteredUserController extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{
    use CreateUserValidation;

    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
    {
        if (!config('openrsc.web_registration_enabled') || (config('app.env') === 'production' && url('/') !== config('app.url'))) {
            return app(RegisterResponse::class);
        }
        $this->validateCreateUserRequest($request);
        event(new Registered($user = $creator->create($request->all())));

        return app(RegisterResponse::class);
    }
}
