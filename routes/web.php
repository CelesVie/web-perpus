<?php

use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Peminjaman;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    // Ngambil agregat data buat dashboard
    $totalBuku = Buku::sum('stok');
    $totalSiswa = Siswa::count();
    $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();

    return view('welcome', compact('totalBuku', 'totalSiswa', 'bukuDipinjam'));
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
