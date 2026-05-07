@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-sm">
        
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Perbarui Data Siswa</h2>
            <p class="mt-2 text-sm text-gray-500">Ubah informasi untuk siswa dengan NIS: <span class="font-semibold text-gray-900">{{ $siswa->nis }}</span></p>
        </div>

        <form action="/siswa/{{ $siswa->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}"
                    class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none"
                    placeholder="Nama siswa">
                @error('nama')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nis" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">NIS</label>
                    <input type="text" name="nis" id="nis" value="{{ old('nis', $siswa->nis) }}"
                        class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none">
                    @error('nis')
                        <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Kelas</label>
                    <div class="relative">
                        <select name="kelas" id="kelas" 
                            class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none appearance-none cursor-pointer">
                            <option value="10" {{ old('kelas', $siswa->kelas) == '10' ? 'selected' : '' }}>Kelas X</option>
                            <option value="11" {{ old('kelas', $siswa->kelas) == '11' ? 'selected' : '' }}>Kelas XI</option>
                            <option value="12" {{ old('kelas', $siswa->kelas) == '12' ? 'selected' : '' }}>Kelas XII</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                    @error('kelas')
                        <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 text-gray-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none"
                    placeholder="Alamat saat ini">{{ old('alamat', $siswa->alamat) }}</textarea>
                @error('alamat')
                    <p class="mt-2 text-xs text-red-500 ml-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" 
                    class="flex-1 rounded-full bg-gray-900 px-6 py-4 text-sm font-semibold text-white shadow-lg hover:bg-gray-800 active:scale-95 transition-all duration-200">
                    Simpan Perubahan
                </button>
                <a href="/siswa" class="px-6 py-4 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection