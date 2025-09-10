<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm.volt');
});

Volt::route('login', 'pages.auth.login')
    ->middleware(['guest'])
    ->name('login');

//full registration page
Volt::route('register', 'pages.auth.register')
    ->middleware('guest')
    ->name('register');

Volt::route('/', 'pages.auth.register-guest')
    ->middleware('public_only')
    ->name('home');

Route::middleware('maybe_guest')->group(function () {
    Route::get('discover', \App\Livewire\Pages\Auth\Discover::class)
        ->name('discover');

    Route::get('search', \App\Livewire\Pages\Auth\Search::class)
        ->name('search');
});

Route::middleware('customer')->group(function () {
    Volt::route('member-profile/{member}', 'pages.auth.member-profile')
        ->where('member', '[0-9]+')
        ->name('member-profile')
        ->can('view', 'member');
});
