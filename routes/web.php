<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System;
use App\Http\Controllers\PeminjamanController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/layanan_barang', [System::class, 'viewBarang']);

Route::get('/layanan_siswa',[System::class,'viewSiswa']);
Route::get('/layanan_peminjaman',[System::class,'viewPeminjaman'])->name('viewPeminjaman');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/create', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('deletePeminjaman');
// Simple closure-based route (no model needed)
Route::get('/welcome', function () {
    return view('welcome'); // Renders welcome.blade.php
})->name('welcome');


