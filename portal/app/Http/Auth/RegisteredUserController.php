<?php

namespace App\Http\Auth;

use App\Traits\CreateUserValidation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Session;
use function App\Helpers\get_client_ip_address;
use function App\Helpers\is_incorrect_production_url;

class RegisteredUserController extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{
    use CreateUserValidation;

    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
    {
        if (!config('openrsc.web_registration_enabled') || is_incorrect_production_url()) {
            \Log::warning("IP " . get_client_ip_address() . " tried to validate with incorrect registration URL in production OR web registration not enabled!");
            Session::flash('error', 'Failed to create account!');
            return app(RegisterResponse::class);
        }
        $this->validateCreateUserRequest($request);
        event(new Registered($user = $creator->create($request->all())));

        return app(RegisterResponse::class);
    }
}
