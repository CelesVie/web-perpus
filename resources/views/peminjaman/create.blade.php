@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-sm">

        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Catat Peminjaman</h2>
            <p class="mt-2 text-sm text-gray-500">Pastikan stok buku tersedia sebelum memproses peminjaman.</p>
        </div>

        <form action="/peminjaman" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="siswa_id" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Siswa Peminjam</label>
                <div class="relative">
                    <select name="siswa_id" id="siswa_id" required
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none appearance-none cursor-pointer">
                        <option value="" disabled selected>Pilih Siswa</option>
                        @foreach($siswas as $s)
                        <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }} ({{ $s->nis }})</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                @error('siswa_id')
                <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="buku_id" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Buku yang Dipinjam</label>
                <div class="relative">
                    <select name="buku_id" id="buku_id" required
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none appearance-none cursor-pointer">
                        <option value="" disabled selected>Pilih Buku</option>
                        @foreach($bukus as $b)
                        <option value="{{ $b->id }}" {{ old('buku_id') == $b->id ? 'selected' : '' }}>{{ $b->judul }} (Stok: {{ $b->stok }})</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                @error('buku_id')
                <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="tanggal_pinjam" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none">
                    @error('tanggal_pinjam')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_kembali" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Estimasi Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}"
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none">
                    @error('tanggal_kembali')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit"
                    class="flex-1 rounded-full bg-blue-600 px-6 py-4 text-sm font-semibold text-white shadow-lg hover:bg-blue-700 active:scale-95 transition-all duration-200">
                    Proses Peminjaman
                </button>
                <a href="/peminjaman" class="px-6 py-4 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection