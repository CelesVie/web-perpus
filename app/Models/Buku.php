<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = ['judul', 'pengarang', 'tahun', 'stok'];

    // Relasi: 1 Buku bisa punya banyak Peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
