<?php
namespace App\Http\Middleware;

use App\Models\BannedIp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\IpUtils;
use function App\Helpers\get_client_ip_address;

class CheckBannedIp
{
    public function handle(Request $request, Closure $next)
    {
        $bannedIps = BannedIp::pluck('ip_address')->toArray();
        $ip = "";
        $user = Auth::user();
        $username = $user ? $user->username : 'Guest';
        try {
            $ip = get_client_ip_address();
        } catch (\Exception $e) {
            \Log::error("Error trying to get IP address of a user in CheckBannedIp, request IP is " . $request->ip() . ", Exception is " . $e->getMessage());
            if (Schema::hasTable('error_logs')) {
                DB::table('error_logs')->insert([
                    'message' => "Error trying to get IP address of a user in CheckBannedIp, request IP is " . $request->ip() . ", Exception is " . $e->getMessage(),
                    'level' => 'error',
                    'url' => $request->fullUrl() ?? "",
                    'username' => $username,
                    'ip' => $request->ip(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if (empty($ip)) {
            \Log::error("Empty IP for a user, request IP is " . $request->ip() . ", skipping CheckBannedIp");
            if (Schema::hasTable('error_logs')) {
                DB::table('error_logs')->insert([
                    'message' => "Empty IP for a user, request IP is " . $request->ip() . ", skipping CheckBannedIp",
                    'level' => 'error',
                    'url' => $request->fullUrl() ?? "",
                    'username' => $username,
                    'ip' => $request->ip(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
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
