@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-10">

    <div class="bg-gray-900 rounded-[2.5rem] p-10 sm:p-16 text-center shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-3/4 bg-blue-500/30 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="relative z-10">
            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-white mb-4">
                Sistem Informasi Perpustakaan.
            </h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-8">
                Pantau sirkulasi buku, kelola anggota, dan optimalkan manajemen perpustakaan lo dalam satu dashboard modern.
            </p>
            <div class="flex items-center justify-center gap-4">
                <a href="/peminjaman/create" class="rounded-full bg-white px-8 py-3.5 text-sm font-bold text-gray-900 shadow-lg hover:bg-gray-100 active:scale-95 transition-all">
                    Pinjamkan Buku
                </a>
                <a href="/buku" class="rounded-full bg-white/10 border border-white/20 px-8 py-3.5 text-sm font-bold text-white hover:bg-white/20 active:scale-95 transition-all backdrop-blur-md">
                    Lihat Koleksi
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="h-12 w-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 mb-6">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">Total Buku Tersedia</p>
            <h3 class="text-4xl font-black text-gray-900">{{ $totalBuku }} <span class="text-lg font-medium text-gray-500">eksemplar</span></h3>
        </div>

        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="h-12 w-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 mb-6">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">Siswa Terdaftar</p>
            <h3 class="text-4xl font-black text-gray-900">{{ $totalSiswa }} <span class="text-lg font-medium text-gray-500">anggota</span></h3>
        </div>

        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="h-12 w-12 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600 mb-6">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-1">Sedang Dipinjam</p>
            <h3 class="text-4xl font-black text-gray-900">{{ $bukuDipinjam }} <span class="text-lg font-medium text-gray-500">transaksi</span></h3>
        </div>
    </div>
</div>
@endsection