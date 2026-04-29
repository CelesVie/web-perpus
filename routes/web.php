<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeminjamanController;

// Halaman utama redirect ke buku
Route::get('/', function () {
    return redirect('/buku');
});

// CRUD Buku
Route::resource('buku', BukuController::class);

// CRUD Siswa
Route::resource('siswa', SiswaController::class);

// CRUD Peminjaman
Route::resource('peminjaman', PeminjamanController::class);

// Route khusus: proses pengembalian buku
Route::patch('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])
    ->name('peminjaman.kembalikan');
