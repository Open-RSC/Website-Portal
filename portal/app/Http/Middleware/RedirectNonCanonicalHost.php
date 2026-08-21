<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function App\Helpers\is_exempt_non_canonical_client;

class RedirectNonCanonicalHost
{
    /**
     * Redirects requests for old or alternate hostnames to the canonical website
     * URL so that we do not serve a duplicate copy of the website on them.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $canonicalHost = $this->normalizeHost(parse_url(config('app.url'), PHP_URL_HOST) ?? '');
        $requestHost = $this->normalizeHost($request->getHost());

        if ($canonicalHost === '' || $requestHost === '' || $requestHost === $canonicalHost) {
            return $next($request);
        }

        if (! in_array($requestHost, $this->redirectHosts(), true)) {
            return $next($request);
        }

        // Some specific sites are allowed to keep using these hosts, and redirecting them would
        // break API clients that do not follow redirects or otherwise cannot use redirects.
        if (is_exempt_non_canonical_client($request)) {
            return $next($request);
        }

        $target = rtrim(config('app.url'), '/').'/'.ltrim($request->getRequestUri(), '/');

        return redirect()->away($target, 301);
    }

    /**
     * The hostnames that should be redirected to the canonical website URL.
     *
     * @return array<int, string>
     */
    private function redirectHosts(): array
    {
        $hosts = explode(',', (string) config('openrsc.non_canonical_hosts', ''));
        $hosts = array_map(fn (string $host): string => $this->normalizeHost(trim($host)), $hosts);

        return array_values(array_filter($hosts, fn (string $host): bool => $host !== ''));
    }

    /**
     * Lowercases a hostname and strips any "www." prefix so that hosts can be compared.
     */
    private function normalizeHost(?string $host): string
    {
        $host = strtolower(trim((string) $host));
        if (str_starts_with($host, 'www.')) {
            $host = substr($host, 4); // Remove "www." from host
        }

        return $host;
    }
}
