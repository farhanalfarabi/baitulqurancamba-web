<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gallery', function () {
    $galleries = Gallery::query()
        ->orderBy('year', 'desc')
        ->orderBy('sort_order', 'asc')
        ->orderBy('id', 'desc')
        ->get()
        ->groupBy('year');

    return view('gallery', compact('galleries'));
})->name('gallery');

Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/daftar', function () {
    return redirect()->route('pendaftaran');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/admin/login', function () {
        return redirect()->route('login');
    })->name('admin.login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Portal Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.pendaftaran.index');
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/pendaftaran', [DashboardController::class, 'pendaftaranIndex'])->name('pendaftaran.index');
    Route::post('/pendaftaran', [DashboardController::class, 'pendaftaranStore'])->name('pendaftaran.store');
    Route::get('/pendaftaran/export', [DashboardController::class, 'pendaftaranExport'])->name('pendaftaran.export');
    Route::put('/pendaftaran/{id}', [DashboardController::class, 'pendaftaranUpdate'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/{id}', [DashboardController::class, 'pendaftaranDestroy'])->name('pendaftaran.destroy');
    Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
    Route::post('/santri', [SantriController::class, 'store'])->name('santri.store');
    Route::get('/santri/export', [SantriController::class, 'export'])->name('santri.export');
    Route::put('/santri/{id}', [SantriController::class, 'update'])->name('santri.update');
    Route::delete('/santri/{id}', [SantriController::class, 'destroy'])->name('santri.destroy');
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}', [GuruController::class, 'show'])->name('guru.show');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::match(['put', 'post'], '/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// Fallback direct storage route (Bypass symlink issues on shared hosting/Hostinger)
Route::get('/storage/{path}', function (string $path) {
    $basePath = realpath(storage_path('app/public'));
    $targetPath = realpath(storage_path('app/public/'.$path));

    if (! $basePath || ! $targetPath || ! str_starts_with($targetPath, $basePath) || ! is_file($targetPath)) {
        abort(404);
    }

    return response()->file($targetPath, [
        'Cache-Control' => 'public, max-age=86400',
    ]);
})->where('path', '.*')->name('storage.file');
