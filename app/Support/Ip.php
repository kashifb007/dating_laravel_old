<?php

/**
 * Class Ip
 * Author: Kashif Bhatti
 * 29/08/2025
 */

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Ip
{
    /** In production: best-effort public IPv4 for the client */
    public static function clientPublicIpv4(Request $request): ?string
    {
        // If proxies are trusted (see section 2), this may already be correct.
        $ip = $request->ip();
        if (self::isValidPublicIpv4($ip)) {
            return $ip;
        }

        // Common proxy/CDN headers
        foreach ([
                     'CF-Connecting-IP',
                     'True-Client-IP',
                     'X-Forwarded-For', // may contain a list
                     'X-Real-IP',
                 ] as $header) {
            $value = $request->headers->get($header);
            if (! $value) {
                continue;
            }

            if ($header === 'X-Forwarded-For') {
                $value = trim(explode(',', $value)[0]);
            }

            if (self::isValidPublicIpv4($value)) {
                return $value;
            }
        }

        // Final fallback: ask a public "what is my ip" service (IPv4-only endpoint)
        try {
            $resp = Http::timeout(2)->get('https://api.ipify.org', ['format' => 'json']);
            $ip = $resp->json('ip');
            if (self::isValidPublicIpv4($ip)) {
                return $ip;
            }
        } catch (\Throwable $e) {
            // ignore
        }

        return null;
    }

    /** In local dev: your machine’s LAN IPv4 without sending data */
    public static function localLanIpv4(): ?string
    {
        try {
            // UDP “connect” selects the outbound interface; no packets are sent.
            $sock = @stream_socket_client('udp://8.8.8.8:53', $errno, $errstr, 1);
            if ($sock) {
                $name = stream_socket_get_name($sock, false); // e.g. "192.168.1.10:54321"
                fclose($sock);
                if ($name) {
                    $ip = explode(':', $name)[0];
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                        return $ip;
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore
        }

        // Fallback (may return loopback on some setups)
        $ip = gethostbyname(gethostname());
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? $ip : null;
    }

    /** One-call convenience wrapper */
    public static function ipv4(Request $request): ?string
    {
        return app()->isLocal()
            ? self::localLanIpv4()
            : self::clientPublicIpv4($request);
    }

    protected static function isValidPublicIpv4(?string $ip): bool
    {
        return filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) !== false;
    }
}
