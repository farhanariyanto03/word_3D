<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\LandingPageController;
use App\Http\Controllers\customer\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);
    Route::get('/order', [OrderController::class, 'index']);
});
