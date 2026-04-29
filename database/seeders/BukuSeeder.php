<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $bukus = [
            ['judul' => 'Laskar Pelangi', 'pengarang' => 'Andrea Hirata', 'tahun' => 2005, 'stok' => 3],
            ['judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer', 'tahun' => 1980, 'stok' => 2],
            ['judul' => 'Negeri 5 Menara', 'pengarang' => 'Ahmad Fuadi', 'tahun' => 2009, 'stok' => 2],
            ['judul' => 'Dilan 1990', 'pengarang' => 'Pidi Baiq', 'tahun' => 2014, 'stok' => 4],
            ['judul' => 'Si Anak Kampoeng', 'pengarang' => 'Masri Sareb Putra', 'tahun' => 2010, 'stok' => 1],
            ['judul' => 'Harry Potter dan Batu Bertuah', 'pengarang' => 'J.K. Rowling', 'tahun' => 1997, 'stok' => 3],
            ['judul' => 'Atomic Habits', 'pengarang' => 'James Clear', 'tahun' => 2018, 'stok' => 2],
            ['judul' => 'Rich Dad Poor Dad', 'pengarang' => 'Robert Kiyosaki', 'tahun' => 1997, 'stok' => 2],
            ['judul' => 'The Alchemist', 'pengarang' => 'Paulo Coelho', 'tahun' => 1988, 'stok' => 2],
            ['judul' => 'Filosofi Teras', 'pengarang' => 'Henry Manampiring', 'tahun' => 2018, 'stok' => 3],
            ['judul' => 'Hujan', 'pengarang' => 'Tere Liye', 'tahun' => 2016, 'stok' => 2],
            ['judul' => 'Pulang', 'pengarang' => 'Tere Liye', 'tahun' => 2015, 'stok' => 2],
            ['judul' => 'Perahu Kertas', 'pengarang' => 'Dee Lestari', 'tahun' => 2009, 'stok' => 2],
            ['judul' => 'Supernova', 'pengarang' => 'Dee Lestari', 'tahun' => 2001, 'stok' => 1],
            ['judul' => 'Sang Pemimpi', 'pengarang' => 'Andrea Hirata', 'tahun' => 2006, 'stok' => 2],
            ['judul' => 'Edensor', 'pengarang' => 'Andrea Hirata', 'tahun' => 2007, 'stok' => 2],
            ['judul' => 'Maryamah Karpov', 'pengarang' => 'Andrea Hirata', 'tahun' => 2008, 'stok' => 1],
            ['judul' => 'Sejarah Indonesia Modern', 'pengarang' => 'M.C. Ricklefs', 'tahun' => 2001, 'stok' => 1],
            ['judul' => 'Matematika SMP Kelas 7', 'pengarang' => 'Kemendikbud', 'tahun' => 2021, 'stok' => 5],
            ['judul' => 'IPA Terpadu Kelas 8', 'pengarang' => 'Kemendikbud', 'tahun' => 2021, 'stok' => 5],
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }
    }
}
