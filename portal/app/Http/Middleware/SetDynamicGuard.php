<?php
namespace App\Http\Middleware;

use App\Models\players;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetDynamicGuard
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
        //WARNING: Be very careful that API routes do not use the Auth::user() facade method because multi-database login/auth is a website-only feature. This probably won't ever matter since API routes usually authenticate based on tokens and params anyway, and APIs already don't support features like CSRF and APIs are stateless anyway.
        if (session()->has('db_connection') && session()->has('expected_username')) {
            $guard = session('db_connection');
            $expectedUsername = session('expected_username');
            $userId = Auth::id();
            Auth::shouldUse($guard);
            $player = new players();
            $player = $player->setConnection($guard)->find($userId);
            $playerUsername = trim(preg_replace('/[-_.]/', ' ', $player?->username ?? ""));
            //This is probably entirely redundant, we already validated the user ID vs database from the login itself, but just in case we check for the correct user again anyway. Then again, if a user gets renamed between their login and the current request, they will have to log in again, so this may not even be entirely redundant.
            if ($player === null || strtolower($playerUsername) !== strtolower($expectedUsername)) {
                \Log::error("This shouldn't happen! player is null: " . ($player === null) . ", playerUsername: $playerUsername vs expectedUsername: $expectedUsername");
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
