@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">➕ Tambah Siswa Baru</h5>
            </div>
            <div class="card-body">
                <form action="/siswa" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <select name="kelas" class="form-select @error('kelas') is-invalid @enderror">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>Kelas 10</option>
                            <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>Kelas 11</option>
                            <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>Kelas 12</option>

                        </select>
                        @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">💾 Simpan</button>
                        <a href="/siswa" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection