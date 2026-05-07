@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-sm">
        
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Edit Informasi Buku</h2>
            <p class="mt-2 text-sm text-gray-500">Perbarui informasi buku "{{ $buku->judul }}" sesuai kebutuhan.</p>
        </div>

        <form action="/buku/{{ $buku->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Judul Buku</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}"
                    class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 placeholder-gray-400 
                    focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 outline-none ring-1 ring-gray-200 focus:ring-blue-500">
                @error('judul')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="pengarang" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" value="{{ old('pengarang', $buku->pengarang) }}"
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 
                        focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 outline-none ring-1 ring-gray-200 focus:ring-blue-500">
                    @error('pengarang')
                        <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tahun" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Tahun Terbit</label>
                    <input type="number" name="tahun" id="tahun" value="{{ old('tahun', $buku->tahun) }}"
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 
                        focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 outline-none ring-1 ring-gray-200 focus:ring-blue-500">
                    @error('tahun')
                        <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="stok" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Jumlah Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok', $buku->stok) }}"
                    class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 
                    focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 outline-none ring-1 ring-gray-200 focus:ring-blue-500">
                @error('stok')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" 
                    class="flex-1 rounded-full bg-gray-900 px-6 py-4 text-sm font-semibold text-white shadow-lg 
                    hover:bg-gray-800 active:scale-95 transition-all duration-200">
                    Perbarui Data
                </button>
                <a href="/buku" 
                    class="px-6 py-4 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection