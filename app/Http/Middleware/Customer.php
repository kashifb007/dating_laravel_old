<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $redirectTo = null): Response
    {
        if ($request->user() && auth()->user()->hasRole(['admin', 'owner', 'super-admin'])) {
            return redirect()->to($redirectTo ?? '/admin');
        }
        if ($request->user() && !$request->user()->hasRole('customer')) {
            return redirect()->to($redirectTo ?? '/login');
        }
        return $next($request);
    }
}
