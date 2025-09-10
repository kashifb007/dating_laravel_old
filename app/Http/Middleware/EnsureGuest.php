<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsureGuest
{
    /**
     * Handle an incoming request.
     *
     * Usage in routes:
     *   ->middleware('as_guest')                 // default redirect
     *   ->middleware('as_guest:/choose-account')// custom redirect path
     */
    public function handle(Request $request, Closure $next, ?string $redirectTo = null): Response
    {
        // If a full user is already authenticated, this is NOT a guest-only page.
        if ($request->user()) {
            return redirect()->to($redirectTo ?? '/login');
        }

        // If session doesn't have guest_id, try cookie.
        if (! $request->session()->has('guest_id')) {
            $cookieId = $request->cookie('guest_id');

            if ($cookieId && Str::isUuid($cookieId) && Guest::whereId($cookieId)->exists()) {
                $request->session()->put('guest_id', $cookieId);

                // Refresh the cookie (sliding expiration). 30 days example.
                Cookie::queue(
                    Cookie::make(
                        name: 'guest_id',
                        value: $cookieId,
                        minutes: 60 * 24 * 30,
                        path: '/',
                        domain: null,
                        secure: $request->isSecure(),
                        httpOnly: true,
                        sameSite: 'lax'
                    )
                );
            }
        }

        // Enforce: must be a cookie based guest (session('guest_id') present).
        if (! $request->session()->has('guest_id')) {
            return redirect()->to($redirectTo ?? '/login');
        }

        return $next($request);
    }
}
