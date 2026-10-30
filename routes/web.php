<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/daftar', function () {
    return redirect()->route('pendaftaran');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/login', function () {
    return redirect()->route('login');
})->name('admin.login');

// Admin Portal Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/pendaftaran', [DashboardController::class, 'pendaftaranIndex'])->name('pendaftaran.index');
    Route::put('/pendaftaran/{id}', [DashboardController::class, 'pendaftaranUpdate'])->name('pendaftaran.update');
    Route::get('/santri', [DashboardController::class, 'santriIndex'])->name('santri.index');
    Route::get('/guru', [DashboardController::class, 'guruIndex'])->name('guru.index');
    Route::get('/gallery', [DashboardController::class, 'galleryIndex'])->name('gallery.index');
});
