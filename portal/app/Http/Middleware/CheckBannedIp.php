<?php
namespace App\Http\Middleware;

use App\Models\BannedIp;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;

class CheckBannedIp
{
    public function handle(Request $request, Closure $next)
    {
        $bannedIps = BannedIp::pluck('ip_address')->toArray();

        if (IpUtils::checkIp($request->ip(), $bannedIps)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Your IP address has been banned.'], 403);
            }
            //Optionally, we could log this event, but it's probably not necessary.
            abort(403, 'Your IP address has been banned.');
        }

        return $next($request);
    }
}
