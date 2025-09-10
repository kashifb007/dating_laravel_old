<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Verify the user is authenticated or a cookie based guest.
 */
class ResolveGuest
{
    public function handle(Request $request, Closure $next, ?string $redirectTo = null): Response
    {
        if (!$request->session()->has('guest_id')) {
            $cookieId = $request->cookie('guest_id');

            if ($cookieId && Str::isUuid($cookieId) && Guest::whereId($cookieId)->exists()) {
                $request->session()->put('guest_id', $cookieId);

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

        // If not guest and not a user, redirect to login
        if (!$request->user() && !$request->session()->has('guest_id')) {
            return redirect()->to($redirectTo ?? '/login');
        }

        //if admin, redirect to admin dashboard
        if ($request->user() && auth()->user()->hasRole(['admin', 'owner', 'super-admin'])) {
            return redirect()->to($redirectTo ?? '/admin');
        }

        return $next($request);
    }
}
