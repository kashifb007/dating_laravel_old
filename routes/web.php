<?php

use App\Http\Controllers\Api\UploadPhotosController;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::view('account', 'livewire.pages.auth.account')
    ->middleware('auth')
    ->name('account');

Route::view('profile', 'livewire.pages.auth.profile')
    ->middleware('auth')
    ->name('profile');

Route::view('subscribe', 'subscribe')
    ->middleware(['auth'])
    ->name('subscribe');

Route::post('/upload_photos', UploadPhotosController::class)
    ->middleware(['auth:web', 'customer'])
    ->name('photos.upload');

require __DIR__.'/auth.php';
