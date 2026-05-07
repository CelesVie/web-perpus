@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Buku</h2>
        <p class="mt-1 text-sm text-gray-500">Kelola daftar buku perpustakaan lo di sini.</p>
    </div>

    <a href="/buku/create" class="inline-flex items-center justify-center rounded-full bg-gray-900 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 active:scale-95 transition-all duration-200">
        <svg class="mr-2 -ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Tambah Buku
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($bukus as $b)
    <div class="group relative bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 ease-out hover:-translate-y-1 flex flex-col justify-between">

        <div>
            <div class="flex justify-between items-start mb-4 gap-4">
                <h3 class="text-xl font-semibold text-gray-900 leading-tight line-clamp-2">
                    {{ $b->judul }}
                </h3>

                @if($b->stok > 0)
                <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 whitespace-nowrap">
                    {{ $b->stok }} Tersedia
                </span>
                @else
                <span class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 whitespace-nowrap">
                    Habis
                </span>
                @endif
            </div>

            <div class="space-y-2 mb-6">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ $b->pengarang }}
                </div>
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $b->tahun }}
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-50 mt-auto">
            <a href="/buku/{{ $b->id }}/edit" class="flex-1 inline-flex justify-center items-center rounded-2xl bg-gray-50 px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                Edit
            </a>

            <form action="/buku/{{ $b->id }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus buku ini? Data yang ilang ga bisa di-recover.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full inline-flex justify-center items-center rounded-2xl bg-red-50/50 px-3 py-2.5 text-sm font-medium text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors">
                    Hapus
                </button>
            </form>
        </div>

    </div>
    @empty
    <div class="col-span-full rounded-3xl border-2 border-dashed border-gray-200 p-12 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum ada buku</h3>
        <p class="mt-1 text-sm text-gray-500">Data buku lo masih kosong. Tambahin sekarang.</p>
        <div class="mt-6">
            <a href="/buku/create" class="inline-flex items-center rounded-full bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 active:scale-95 transition-all">
                Tambah Buku
            </a>
        </div>
    </div>
    @endforelse
</div>
@endsection