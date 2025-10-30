<?php

use App\Http\Controllers\Api\CitySearchController;
use App\Http\Controllers\Api\UploadPhotosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['static.api', 'throttle:citysearch'])
    ->get('/citysearch', CitySearchController::class)
->name('api.citysearch');

Route::middleware(['auth:sanctum', 'customer'])
    ->post('/upload_photos', UploadPhotosController::class)
    ->name('api.upload-photos');
