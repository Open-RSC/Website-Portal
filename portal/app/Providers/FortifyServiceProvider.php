<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use function App\Helpers\add_characters;
use function App\Helpers\passwd_compat_hasher;
use function App\Helpers\password_needs_rehashing;
use App\Models\players;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView(function () {
            if (!config('openrsc.login_enabled')) {
                abort(404);
            }

            return view('auth.login');
        });

        Fortify::registerView(function () {
            if (!config('openrsc.web_registration_enabled')) {
                abort(404);
            }

            return view('auth.register');
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(5)->by($username.$request->ip());
        });

        RateLimiter::for('register', function (Request $request) {
            return Limit::perMinutes(10, 5)->by($request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function (Request $request) {
            if (!config('openrsc.login_enabled')) {
                return false;
            }
            try {
                $validated = $request->validate([
                    'username' => ['bail', 'regex:/^([a-zA-Z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                    'password' => ['regex:/^([ -~])+$/i', 'required', 'min:4', 'max:20'],
                    'db' => ['required', 'in:preservation,cabbage,uranium,coleslaw,openpk,2001scape'], // Validate the 'db' input
                ]);
            } catch (ValidationException $e) {
                //\Log::info($e->validator->errors());
                return false;
            }

            $username = $request->input('username');
            $password = add_characters($request->input('password'), 20);
            $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));
            $database = $request->input('db');
            $user = players::on($database)->where('username', '=', $trimmed_username)->first();
            if ($user === null) {
                return false;
            }
            if ($user->salt) {
                $trimmed_pass = passwd_compat_hasher(trim($password), $user->salt);
            } else {
                $trimmed_pass = trim($password);
            }
            //If we're still using SHA512 for the password, do a simple comparison.
            if (password_needs_rehashing($user->pass)) {
                if ($trimmed_pass !== $user->pass) {
                    return false;
                }
            } elseif (!Hash::check($trimmed_pass, $user->pass)) { //Otherwise, we have a bcrypt hash in the DB to check.
                return false;
            }
            if ($user) {
                if (config('openrsc.login_admin_only') && ! $user->hasAdmin()) {
                    return false;
                }
                if ($database !== "preservation" && (!$request->attributes->has('dynamic_guard_middleware_ran') || $request->attributes->get('dynamic_guard_middleware_ran') !== true)) {
                    \Log::error("Player $trimmed_username tried to log in to database $database but dynamic guard did not run on the request, logging in to any database other than the default (preservation) is unsafe because player IDs can differ between databases!");
                    return false;
                }
                session(['db_connection' => $database, 'expected_username' => $trimmed_username]);
                return $user;
            }

            return false;
        });
    }
}
