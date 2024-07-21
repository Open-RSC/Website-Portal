<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

use function App\Helpers\get_client_ip_address;

class SetDynamicGuardChecker
{
    /**
     * This middleware checks that the SetDynamicGuard middleware has run successfully, and if not,
     * and also if the database is not preservation, then it forces a logout of the user.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Also check that it's preservation, if it's not then it could be an old session before multi_world_logins was turned off. In which case, we will want to force a logout anyway.
        if (!config('openrsc.multi_world_logins') && session('db_connection') === 'preservation') {
            return $next($request);
        }
        if (Auth::user() !== null && session('db_connection') !== 'preservation') {
            $user = Auth::user();
            $username = $user ? $user->username : 'Guest';
            $database = session('db_connection');
            //If the dynamic guard middleware did not run successfully, this attribute won't be set, we might not have the correct user, so force a logout and log an error.
            if (!$request->attributes->get('dynamic_guard_middleware_ran')) {
                $ip = '';
                try {
                    $ip = get_client_ip_address();
                } catch (\Exception $e) {
                    \Log::error("Error fetching ip address in SetDynamicGuardChecker for player $username database $database, request IP is " . $request->ip() . ', Exception is ' . $e->getMessage());
                    if (Schema::hasTable('error_logs')) {
                        DB::table('error_logs')->insert([
                            'message' => "Error fetching ip address in SetDynamicGuardChecker for player $username database $database, request IP is " . $request->ip() . ', Exception is ' . $e->getMessage(),
                            'level' => 'error',
                            'url' => $request->fullUrl() ?? '',
                            'username' => $username,
                            'ip' => $ip,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
                \Log::error("Player $username IP $ip database $database loaded a page but dynamic guard did not run on the request, serving a page with a user from any database other than the default (preservation) is unsafe because player IDs can differ between databases, forcing logout!");
                if (Schema::hasTable('error_logs')) {
                    DB::table('error_logs')->insert([
                        'message' => "Player $username IP $ip database $database loaded a page but dynamic guard did not run on the request, serving a page with a user from any database other than the default (preservation) is unsafe because player IDs can differ between databases, forcing logout!",
                        'level' => 'error',
                        'url' => $request->fullUrl() ?? '',
                        'username' => $username,
                        'ip' => $ip,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                //We could probably also return $next($request) right below logout, but we might want dynamic_guard_checker_middleware_ran to be true, since it technically is true.
                Auth::logout();
            }
        }
        $request->attributes->set('dynamic_guard_checker_middleware_ran', true);

        return $next($request);
    }
}
