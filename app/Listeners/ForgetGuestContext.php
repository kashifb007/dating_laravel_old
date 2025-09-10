<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Cookie;

/**
 * Forget the session and cookie if a full user logs in.
 */
class ForgetGuestContext
{
    public function handle(Login|Registered $event): void
    {
        Cookie::queue(Cookie::forget('guest_id'));
        session()->forget('guest_id');
    }
}
