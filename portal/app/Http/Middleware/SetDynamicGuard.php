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
        //WARNING: Be very careful that API routes do not user Auth::user() facade because multi-database login/auth is a website-only feature. This probably won't ever matter since API routes usually authenticate based on tokens and params anyway, and APIs already don't support features like CSRF and APIs are stateless anyway.
        if (session()->has('db_connection') && session()->has('expected_username')) {
            $guard = session('db_connection');
            $expectedUsername = session('expected_username');
            $userId = Auth::id();
            Auth::shouldUse($guard);
            $player = new players();
            $player = $player->setConnection($guard)->find($userId);
            $playerUsername = trim(preg_replace('/[-_.]/', ' ', $player->username));
            if ($player == null || strtolower($playerUsername) != strtolower($expectedUsername)) {
                Auth::logout();
                return $next($request);
            }
            session(['db_connection' => $guard]);
            //Seems like Auth::login regenerates a session, which loses the db_connection session variable.
            //Auth::login($player);
            //Seems like it still doesn't work, still regenerates session.
            //Auth::guard($guard)->login($player);
            //dd(Auth::user());
            //Seems like we can set setUser instead without having to log in.
            Auth::setUser($player);
        } else {
            Auth::logout();
        }
        return $next($request);
    }
}
