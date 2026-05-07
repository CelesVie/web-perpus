@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Siswa</h2>
        <p class="mt-1 text-sm text-gray-500">Daftar anggota perpustakaan aktif.</p>
    </div>
    <a href="/siswa/create" class="inline-flex items-center justify-center rounded-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 active:scale-95 transition-all duration-200">
        <svg class="mr-2 -ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Siswa
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($siswas as $s)
    <div class="group relative bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 ease-out hover:-translate-y-1 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-start mb-4 gap-4">
                <h3 class="text-xl font-semibold text-gray-900 leading-tight">{{ $s->nama }}</h3>
                <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20">
                    Kelas {{ $s->kelas }}
                </span>
            </div>

            <div class="space-y-2 mb-6">
                <div class="flex items-center text-sm text-gray-500">
                    <span class="font-medium mr-2">NIS:</span> {{ $s->nis }}
                </div>
                <div class="flex items-start text-sm text-gray-500">
                    <svg class="mr-2 h-4 w-4 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="line-clamp-2">{{ $s->alamat }}</span>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-50">
            <a href="/siswa/{{ $s->id }}/edit" class="flex-1 inline-flex justify-center items-center rounded-2xl bg-gray-50 px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">Edit</a>
            <form action="/siswa/{{ $s->id }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus data siswa ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full inline-flex justify-center items-center rounded-2xl bg-red-50/50 px-3 py-2.5 text-sm font-medium text-red-600 hover:bg-red-100 transition-colors">Hapus</button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full rounded-3xl border-2 border-dashed border-gray-200 p-12 text-center text-gray-400">Belum ada data siswa.</div>
    @endforelse
</div>
@endsection