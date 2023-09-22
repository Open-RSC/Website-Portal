<?php
namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests;
use Closure;

class CustomThrottling extends ThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int|string  $maxAttempts
     * @param  float|int  $decayMinutes
     * @param  string  $prefix
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        $routeName = $request->route()->getName();
        try {
            $customThrottling = \DB::table('custom_throttling')->where("route_name", "=", $routeName)->first();

            if ($customThrottling) {
                $maxAttempts = $customThrottling->max_attempts ?? $maxAttempts;
                $decayMinutes = $customThrottling->decay_minutes ?? $decayMinutes;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            //We don't need to log the error, it just means we didn't run the migration.
        }
        return parent::handle($request, $next, $maxAttempts, $decayMinutes, $prefix);
    }
}
