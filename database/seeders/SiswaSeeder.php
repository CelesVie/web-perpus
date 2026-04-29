<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['nama' => 'Budi Santoso', 'kelas' => '10'],
            ['nama' => 'Siti Rahayu', 'kelas' => '10'],
            ['nama' => 'Ahmad Fauzi', 'kelas' => '10'],
            ['nama' => 'Dewi Lestari', 'kelas' => '11'],
            ['nama' => 'Rizky Pratama', 'kelas' => '11'],
            ['nama' => 'Nur Azizah', 'kelas' => '11'],
            ['nama' => 'Agus Setiawan', 'kelas' => '12'],
            ['nama' => 'Maya Sari', 'kelas' => '12'],
            ['nama' => 'Doni Firmansyah', 'kelas' => '12'],
            ['nama' => 'Rina Wati', 'kelas' => '12'],
        ];

        foreach ($siswas as $siswa) {
            Siswa::create($siswa);
        }
    }
}
