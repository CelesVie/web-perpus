<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = ['buku_id', 'siswa_id', 'tanggal_pinjam', 'tanggal_kembali', 'status'];

    // Relasi: 1 Peminjaman milik 1 Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    // Relasi: 1 Peminjaman milik 1 Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
