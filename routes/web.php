<?php

use App\Http\Controllers\admin\NomorRekeningController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\admin\VidioController;
use App\Http\Controllers\admin\DashboardAdminController;
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
    Route::put('/pesanan/{id}/proses', [PesananController::class, 'updateProses'])->name('pesanan.proses');
    Route::put('/pesanan/{id}/selesai', [PesananController::class, 'updateSelesai'])->name('pesanan.selesai');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('customer.index');
    Route::get('/order/{id}', [LandingPageController::class, 'order'])->name('order.index');
    Route::post('/order/{id}', [LandingPageController::class, 'orderStore'])->name('order.store');
    Route::get('/history-order', [LandingPageController::class, 'historyOrder'])->name('history-order.index');
    Route::post('/testimonial', [LandingPageController::class, 'testimonialStore'])->name('testimonial.store');
});
