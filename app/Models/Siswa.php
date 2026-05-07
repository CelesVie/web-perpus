<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = ['nama', 'nis', 'kelas', 'alamat'];
    
    public static $kelasOptions = ['10', '11', '12'];

    // Relasi: 1 Siswa bisa punya banyak Peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
