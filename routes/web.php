<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
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
    Route::post('/pendaftaran', [DashboardController::class, 'pendaftaranStore'])->name('pendaftaran.store');
    Route::get('/pendaftaran/export', [DashboardController::class, 'pendaftaranExport'])->name('pendaftaran.export');
    Route::put('/pendaftaran/{id}', [DashboardController::class, 'pendaftaranUpdate'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/{id}', [DashboardController::class, 'pendaftaranDestroy'])->name('pendaftaran.destroy');
    Route::get('/santri', [DashboardController::class, 'santriIndex'])->name('santri.index');
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}', [GuruController::class, 'show'])->name('guru.show');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/gallery', [DashboardController::class, 'galleryIndex'])->name('gallery.index');
});
