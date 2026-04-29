<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // with('buku','siswa') = eager loading, supaya relasi ikut diambil sekalian
        $data = Peminjaman::with('buku', 'siswa')->get();
        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        $bukus  = Buku::where('stok', '>', 0)->get(); // Hanya tampilkan buku yang stoknya ada
        $siswas = Siswa::all();
        return view('peminjaman.create', compact('bukus', 'siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id'        => 'required|exists:bukus,id',
            'siswa_id'       => 'required|exists:siswas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        Peminjaman::create($request->all());
        return redirect('/peminjaman')->with('sukses', 'Peminjaman berhasil dicatat!');
    }

    // Proses pengembalian buku
    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'tanggal_kembali' => now()->toDateString(),
            'status'          => 'dikembalikan',
        ]);
        return redirect('/peminjaman')->with('sukses', 'Buku berhasil dikembalikan!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect('/peminjaman')->with('sukses', 'Data peminjaman berhasil dihapus!');
    }
}
