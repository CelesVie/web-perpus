@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Peminjaman</h2>
        <p class="mt-1 text-sm text-gray-500">Pantau sirkulasi buku yang sedang dipinjam.</p>
    </div>
    <a href="/peminjaman/create" class="inline-flex items-center rounded-full bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-blue-700 active:scale-95 transition-all">
        Proses Peminjaman
    </a>
</div>

<div class="space-y-4">
    @forelse($peminjamans as $p)
    <div class="group bg-white rounded-3xl p-5 border border-gray-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:shadow-md">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-width="2" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-900">{{ $p->siswa->nama }}</h4>
                <p class="text-sm text-gray-500">Meminjam: <span class="font-medium text-gray-700">{{ $p->buku->judul }}</span></p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 px-4 border-l border-gray-100 hidden md:grid">
            <div>
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400">Tgl Pinjam</p>
                <p class="text-sm font-medium text-gray-700">{{ $p->tgl_pinjam }}</p>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400">Tgl Kembali</p>
                <p class="text-sm font-medium text-gray-700">{{ $p->tgl_kembali }}</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <form action="/peminjaman/{{ $p->id }}" method="POST" onsubmit="return confirm('Buku sudah dikembalikan?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-full bg-gray-50 px-5 py-2 text-xs font-bold text-gray-600 hover:bg-green-50 hover:text-green-600 transition-all">Selesaikan</button>
            </form>
        </div>
    </div>
    @empty
    <div class="rounded-3xl border-2 border-dashed border-gray-200 p-10 text-center text-gray-400 font-medium italic">Belum ada catatan peminjaman aktif.</div>
    @endforelse
</div>
@endsection