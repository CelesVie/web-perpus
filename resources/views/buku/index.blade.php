@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📚 Data Buku</h2>
    <a href="/buku/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Buku
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bukus as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->tahun }}</td>
                    <td>
                        <span class="badge {{ $b->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $b->stok }} tersedia
                        </span>
                    </td>
                    <td>
                        <a href="/buku/{{ $b->id }}/edit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="/buku/{{ $b->id }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Yakin mau hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection