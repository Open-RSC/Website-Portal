<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use function App\Helpers\get_client_ip_address;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        if (config('openrsc.login_logging_enabled')) {
            $user = $event->user;
            \DB::table('successful_login_logs')->insert([
                'username' => $user->username,
                'ip' => get_client_ip_address(),
                'created_at' => now(),
            ]);
        }
    }
}
