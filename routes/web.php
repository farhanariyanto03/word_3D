<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\VidioController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\admin\NomorRekeningController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\customer\LandingPageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/ceklogin', [LoginController::class, 'ceklogin'])->name('login.ceklogin');
    Route::get('/register', [LoginController::class, 'register'])->name('login.register');
    Route::post('/register', [LoginController::class, 'registerStore'])->name('register.store');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [LandingPageController::class, 'index'])->name('customer.index');
Route::get('/order/{id}/show-all', [LandingPageController::class, 'showAllOrder'])->name('order.show-all');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.layout');
    });
    Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('vidio', VidioController::class);
    Route::resource('nomor-rekening', NomorRekeningController::class);
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::put('/pesanan/{id}/proses', [PesananController::class, 'updateProses'])->name('pesanan.proses');
    Route::delete('/pesanan/{id}/tolak', [PesananController::class, 'deleteOrder'])->name('pesanan.tolak');
    Route::put('/pesanan/{id}/selesai', [PesananController::class, 'updateSelesai'])->name('pesanan.selesai');
    Route::get('/pesanan/{id}/cetak-invoice', [PesananController::class, 'cetakInvoice'])->name('pesanan.invoice');
    Route::put('/pesanan/{id}/link-video', [PesananController::class, 'updateOrder'])->name('pesanan.link-video');
});

Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/order/{id}', [LandingPageController::class, 'order'])->name('order.index');
    Route::post('/order/{id}', [LandingPageController::class, 'orderStore'])->name('order.store');
    Route::get('/history-order', [LandingPageController::class, 'historyOrder'])->name('history-order.index');
    Route::post('/testimonial', [LandingPageController::class, 'testimonialStore'])->name('testimonial.store');
    Route::put('/pelunasan/{id}', [LandingPageController::class, 'pelunasan'])->name('pelunasan.update');
});
