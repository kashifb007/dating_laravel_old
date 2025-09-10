<?php

use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware(['maybe_guest'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('complete-registration', 'register-prompt')
    ->middleware('guest')
    ->name('register-prompt');

require __DIR__.'/auth.php';
