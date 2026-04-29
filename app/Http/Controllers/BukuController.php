<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Tampilkan semua buku
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    // Tampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Simpan buku baru ke database
    public function store(Request $request)
    {
        // Validasi input — ini yang TIDAK ADA di materi ajar lo
        $request->validate([
            'judul'     => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y'),
            'stok'      => 'required|integer|min:1',
        ]);

        Buku::create($request->all());
        return redirect('/buku')->with('sukses', 'Buku berhasil ditambahkan!');
    }

    // Tampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y'),
            'stok'      => 'required|integer|min:1',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/buku')->with('sukses', 'Buku berhasil diperbarui!');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect('/buku')->with('sukses', 'Buku berhasil dihapus!');
    }
}
