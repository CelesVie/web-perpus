@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h5 class="mb-0">✏️ Edit Data Siswa</h5>
            </div>
            <div class="card-body">
                <form action="/siswa/{{ $siswa->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $siswa->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <select name="kelas" class="form-select @error('kelas') is-invalid @enderror">
                            <option value="10" {{ $siswa->kelas == '10' ? 'selected' : '' }}>Kelas 10</option>
                            <option value="11" {{ $siswa->kelas == '11' ? 'selected' : '' }}>Kelas 11</option>
                            <option value="12" {{ $siswa->kelas == '12' ? 'selected' : '' }}>Kelas 12</option>
                        </select>
                        @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">🔄 Update</button>
                        <a href="/siswa" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection