<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

Route::get('/daftar', function () {
    return redirect()->route('pendaftaran');
});
