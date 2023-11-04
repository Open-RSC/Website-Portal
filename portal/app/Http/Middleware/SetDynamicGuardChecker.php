<?php
namespace App\Http\Middleware;

use App\Models\players;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use function App\Helpers\get_client_ip_address;

class SetDynamicGuardChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() !== null && session('db_connection') !== "preservation") {
            $username = Auth::user()->username;
            $database = session('db_connection');
            //If the dynamic guard middleware did not run successfully, this attribute won't be set, we might not have the correct user, so force a logout and log an error.
            if (!$request->attributes->get('dynamic_guard_middleware_ran')) {
                $ip = "";
                try {
                    $ip = get_client_ip_address();
                } catch (E\xception $e) {

                }
                \Log::error("Player $username IP $ip database $database loaded a page but dynamic guard did not run on the request, serving a page with a user from any database other than the default (preservation) is unsafe because player IDs can differ between databases, forcing logout!");
                Auth::logout();
            }
        }
        $request->attributes->set('dynamic_guard_checker_middleware_ran', true);
        return $next($request);
    }
}
