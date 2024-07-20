<?php

namespace App\Providers;

use App\Models\players;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\Illuminate\Contracts\Debug\ExceptionHandler::class, \App\Exceptions\Handler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $this->bootAuth();
        $this->bootRoute();
    }

    public function bootAuth(): void
    {
        Gate::define('website-admin', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('website-moderator', function (User $user) {
            return $user->isModerator();
        });

        Gate::define('admin', function (players $user) {
            return $user->hasAdmin();
        });

        Gate::define('moderator', function (players $user) {
            return $user->hasModerator();
        });

        Gate::define('player-moderator', function (players $user) {
            return $user->hasPlayerModerator();
        });
    }

    public function bootRoute(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        if (config('openrsc.force_https', false)) {
            resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');
        }
    }
}
