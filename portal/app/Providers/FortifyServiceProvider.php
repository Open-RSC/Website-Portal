<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\players;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use function App\Helpers\add_characters;
use function App\Helpers\passwd_compat_hasher;
use function App\Helpers\password_needs_rehashing;

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
            return view('auth.login');
        });
        
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(5)->by($username.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        
        Fortify::authenticateUsing(function (Request $request) {
            try {
                $validated = $request->validate([
                    'username' => ['bail', 'regex:/^([-a-z0-9_ ])+$/i', 'required', 'min:2', 'max:12'],
                    'password' => 'required|min:4|max:20',
                ]);
            } catch (ValidationException $e) {
               return false;
            }

            $username = $request->input('username');
            $password = add_characters($request->input('password'), 20);
            $user = players::on('preservation')->where('username', "=", $username)->first();
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
            } else if (!Hash::check($trimmed_pass, $user->pass)) { //Otherwise, we have a bcrypt hash in the DB to check.
                return false;
            }
            if ($user) {
                return $user;
            }
            return false;
        });
    }
}
