<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use function App\Helpers\get_client_ip_address;

class LogFailedLogin
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
    public function handle(Failed $event): void
    {
        if (config('openrsc.login_logging_enabled')) {
            $credentials = $event->credentials;
            \DB::table('failed_login_logs')->insert([
                'username' => $credentials['username'], 
                'ip' => get_client_ip_address(),
                'created_at' => now(),
            ]);
        }
    }
}
