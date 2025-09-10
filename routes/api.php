<?php

use App\Http\Controllers\Api\CitySearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['static.api', 'throttle:citysearch'])
    ->get('/citysearch', CitySearchController::class);
