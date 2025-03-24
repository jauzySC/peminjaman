<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginRegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'login']);
Route::get('/register', [LoginRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'register']);
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    // Your existing protected routes
    Route::get('/layanan_barang', [System::class, 'viewBarang']);
    Route::get('/layanan_siswa', [System::class, 'viewSiswa']);
    Route::get('/layanan_peminjaman', [System::class, 'viewPeminjaman'])->name('viewPeminjaman');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman/create', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('deletePeminjaman');
    Route::get('/editPeminjaman/{id}', [PeminjamanController::class, 'createEdit']);
    Route::put('/editPeminjaman/{id}', [PeminjamanController::class, 'storeEdit']);
});

// Public route
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');