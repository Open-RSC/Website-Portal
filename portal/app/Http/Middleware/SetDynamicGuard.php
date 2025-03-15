<?php

namespace App\Http\Middleware;

use App\Models\players;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

use function App\Helpers\get_client_ip_address;

class SetDynamicGuard
{
    /**
     * This middleware sets the correct user for a non-default database (database other than preservation) login.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('openrsc.multi_world_logins')) {
            return $next($request);
        }
        // WARNING: Be very careful that API routes do not use the Auth::user() facade method because multi-database login/auth is a website-only feature. This probably won't ever matter since API routes usually authenticate based on tokens and params anyway, and APIs already don't support features like CSRF and APIs are stateless anyway.
        if (session()->has('db_connection') && session()->has('expected_username')) {
            $database = session('db_connection');
            $expectedUsername = session('expected_username');
            $userId = Auth::id();
            Auth::shouldUse($database);
            $player = new players;
            $player = $player->setConnection($database)->find($userId);
            $playerUsername = trim(preg_replace('/[-_.]/', ' ', $player?->username ?? ''));
            $ip = '';
            try {
                $ip = get_client_ip_address();
            } catch (\Exception $e) {
                \Log::error("Error fetching ip address in SetDynamicGuard for playerUsername $playerUsername expectedUsername $expectedUsername database $database, request IP is ".$request->ip().', Exception is '.$e->getMessage());
                if (Schema::hasTable('error_logs')) {
                    DB::table('error_logs')->insert([
                        'message' => "Error fetching ip address in SetDynamicGuard for playerUsername $playerUsername expectedUsername $expectedUsername database $database, request IP is ".$request->ip().', Exception is '.$e->getMessage(),
                        'level' => 'error',
                        'url' => $request->fullUrl() ?? '',
                        'username' => $playerUsername,
                        'ip' => $ip,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            // This may seem entirely redundant, since we already validated the user ID vs database from the login itself (but would the ID even match for sure?), but just in case we check for the correct user again anyway. Then again, if a user gets renamed between their login and the current request, they will have to log in again, so this may not even be entirely redundant.
            if ($player === null || strtolower($playerUsername) !== strtolower($expectedUsername)) {
                \Log::error("This shouldn't happen! is player null: ".($player === null).", playerUsername: $playerUsername vs expectedUsername: $expectedUsername");
                if (Schema::hasTable('error_logs')) {
                    DB::table('error_logs')->insert([
                        'message' => "This shouldn't happen! is player null: ".($player === null).", playerUsername: $playerUsername vs expectedUsername: $expectedUsername",
                        'level' => 'error',
                        'url' => $request->fullUrl() ?? '',
                        'username' => $playerUsername,
                        'ip' => $ip,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                Auth::logout();
                $request->attributes->set('dynamic_guard_middleware_ran', true);

                return $next($request);
            }
            Auth::setUser($player);
        } else {
            Auth::logout();
        }
        $request->attributes->set('dynamic_guard_middleware_ran', true);

        return $next($request);
    }
}
