@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-sm">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Registrasi Siswa</h2>
            <p class="mt-2 text-sm text-gray-500">Lengkapi data diri siswa untuk keanggotaan perpus.</p>
        </div>

        <form action="/siswa" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none" placeholder="Contoh: Tobias Ibrahim" required>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">NIS</label>
                    <input type="text" name="nis" class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none" placeholder="Nomor Induk Siswa" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Kelas</label>
                    <select name="kelas" class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none appearance-none">
                        <option value="10">Kelas X</option>
                        <option value="11">Kelas XI</option>
                        <option value="12">Kelas XII</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full rounded-2xl border-none bg-gray-50 px-4 py-3.5 focus:bg-white focus:ring-2 focus:ring-blue-500/20 ring-1 ring-gray-200 transition-all outline-none" placeholder="Alamat lengkap siswa..."></textarea>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-gray-900 px-6 py-4 text-sm font-semibold text-white shadow-lg hover:bg-gray-800 active:scale-95 transition-all">Simpan Data</button>
                <a href="/siswa" class="px-6 py-4 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection