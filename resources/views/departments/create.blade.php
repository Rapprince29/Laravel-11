@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">📝 Tambah Data Departemen</h2>

  <form action="{{ route('departments.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Departemen</label>
      <input type="text" name="nama" class="form-control" placeholder="Masukkan nama departemen" required>
      @error('nama')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection