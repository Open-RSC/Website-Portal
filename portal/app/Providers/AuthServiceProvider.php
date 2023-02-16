<?php

namespace App\Providers;

use App\Models\players;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User' => 'App\Models\players'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('website-admin', function (User $user) {
            return $user->isAdmin();
        });
        
        Gate::define('admin', function (players $user) {
            return $user->hasAdmin();
        });
        
        Gate::define('moderator', function (players $user) {
            return $user->hasModerator();
        });
        
        Gate::define('website-moderator', function (User $user) {
            return $user->isModerator();
        });
        
        Gate::define('player-moderator', function (players $user) {
            return $user->hasPlayerModerator();
        });
    }
}
