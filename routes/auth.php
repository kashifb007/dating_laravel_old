<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Pages\Auth\Discover;
use App\Livewire\Pages\Auth\Search;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::bind('member', function ($value) {
    return User::query()->findOrFail($value);
});

Route::middleware('guest')->group(function () {
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');

    Volt::route('register', 'pages.auth.register')
        ->middleware('guest')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('/', 'pages.auth.home')
        ->name('home');
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

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('discover', Discover::class)
        ->name('discover');

    Route::get('search', Search::class)
        ->name('search');

    Volt::route('member-profile/{member}', 'pages.auth.member-profile')
        ->where('member', '[0-9]+')
        ->name('member.profile')
        ->can('view', 'member');
});
