@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📋 Data Peminjaman</h2>
    <a href="/peminjaman/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Catat Peminjaman
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Siswa</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->buku->judul }}</td>
                    <td>{{ $d->siswa->nama }} <small class="text-muted">(Kls {{ $d->siswa->kelas }})</small></td>
                    <td>{{ $d->tanggal_pinjam }}</td>
                    <td>{{ $d->tanggal_kembali ?? '-' }}</td>
                    <td>
                        @if($d->status == 'dipinjam')
                        <span class="badge bg-warning text-dark">Dipinjam</span>
                        @else
                        <span class="badge bg-success">Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        @if($d->status == 'dipinjam')
                        <form action="/peminjaman/{{ $d->id }}/kembalikan" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm"
                                onclick="return confirm('Tandai buku ini sudah dikembalikan?')">
                                ✅ Kembalikan
                            </button>
                        </form>
                        @endif

                        <form action="/peminjaman/{{ $d->id }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Hapus data peminjaman ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection