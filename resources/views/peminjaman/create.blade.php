@extends('layouts.app')

@section('title', 'Catat Peminjaman')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h5 class="mb-0">➕ Catat Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <form action="/peminjaman" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Buku</label>
                        <select name="buku_id" class="form-select @error('buku_id') is-invalid @enderror">
                            <option value="">-- Pilih Buku --</option>
                            @foreach($bukus as $b)
                            <option value="{{ $b->id }}" {{ old('buku_id') == $b->id ? 'selected' : '' }}>
                                {{ $b->judul }} (Stok: {{ $b->stok }})
                            </option>
                            @endforeach
                        </select>
                        @error('buku_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Siswa</label>
                        <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswas as $s)
                            <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->nama }} (Kelas {{ $s->kelas }})
                            </option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam"
                            class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                            value="{{ old('tanggal_pinjam', date('Y-m-d')) }}">
                        @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Kembali <small class="text-muted">(opsional)</small></label>
                        <input type="date" name="tanggal_kembali"
                            class="form-control @error('tanggal_kembali') is-invalid @enderror"
                            value="{{ old('tanggal_kembali') }}">
                        @error('tanggal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">💾 Simpan</button>
                        <a href="/peminjaman" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection