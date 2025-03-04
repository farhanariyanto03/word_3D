<?php

use App\Http\Controllers\admin\NomorRekeningController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\admin\VidioController;
use App\Http\Controllers\customer\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\LandingPageController;
use App\Http\Controllers\customer\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layout');
    });
    Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('vidio', VidioController::class);
    Route::resource('nomor-rekening', NomorRekeningController::class);
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);
    Route::get('/order', [OrderController::class, 'index']);
});
