<?php
namespace App\Http\Middleware;

use App\Models\BannedIp;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use function App\Helpers\get_client_ip_address;

class CheckBannedIp
{
    public function handle(Request $request, Closure $next)
    {
        $bannedIps = BannedIp::pluck('ip_address')->toArray();
        $ip = "";

        try {
            $ip = get_client_ip_address();
        } catch (\Exception $e) {
            \Log::error("Error trying to get IP address of a user in CheckBannedIp, request IP is " . $request->ip() . ", Exception is " . $e->getMessage());
        }

        if (empty($ip)) {
            \Log::error("Empty IP for a user, request IP is " . $request->ip() . ", skipping CheckBannedIp");
            return $next($request);
        }

        if (IpUtils::checkIp($ip, $bannedIps)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Your IP address has been banned.'], 403);
            }
            //Optionally, we could log this event, but it's probably not necessary.
            abort(403, 'Your IP address has been banned.');
        }

        return $next($request);
    }
}
