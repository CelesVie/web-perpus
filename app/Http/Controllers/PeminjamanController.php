<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ubah $data menjadi $peminjamans
        $peminjamans = Peminjaman::with('buku', 'siswa')->get();

        // Ubah juga nama yang dikirim di compact
        return view('peminjaman.index', compact('peminjamans'));
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

        return DB::transaction(function () use ($request) {
            // Lock baris buku biar ga ada race condition kalau 2 request masuk bersamaan
            $buku = Buku::where('id', $request->buku_id)->lockForUpdate()->firstOrFail();

            if ($buku->stok < 1) {
                return redirect('/peminjaman')->with('error', 'Stok buku habis, tidak bisa dipinjam!');
            }

            Peminjaman::create($request->all());
            $buku->decrement('stok');

            return redirect('/peminjaman')->with('success', 'Peminjaman berhasil dicatat!');
        });
    }

    // Proses pengembalian buku
    public function kembalikan($id)
    {
        return DB::transaction(function () use ($id) {
            $peminjaman = Peminjaman::with('buku')->findOrFail($id);

            // Guard: kalau udah dikembalikan sebelumnya, jangan tambah stok lagi
            if ($peminjaman->status === 'dikembalikan') {
                return redirect('/peminjaman')->with('error', 'Buku ini sudah dikembalikan sebelumnya.');
            }

            $peminjaman->update([
                'tanggal_kembali' => now()->toDateString(),
                'status'          => 'dikembalikan',
            ]);

            $peminjaman->buku()->increment('stok');

            return redirect('/peminjaman')->with('success', 'Buku berhasil dikembalikan!');
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            $peminjaman = Peminjaman::findOrFail($id);

            // Kalau data yang dihapus masih berstatus "dipinjam", stok bukunya harus dibalikin
            // biar ga hilang begitu aja (data integrity)
            if ($peminjaman->status === 'dipinjam') {
                $peminjaman->buku()->increment('stok');
            }

            $peminjaman->delete();
            return redirect('/peminjaman')->with('success', 'Data peminjaman berhasil dihapus!');
        });
    }
}