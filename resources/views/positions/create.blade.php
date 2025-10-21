@extends('master')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">📝 Tambah Jabatan Baru</h2>

  <form action="{{ route('positions.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Jabatan</label>
      <input type="text" name="nama_jabatan" class="form-control" placeholder="Masukkan nama jabatan" required>
      @error('nama_jabatan')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Gaji Pokok (Rp)</label>
      <input type="number" name="gaji_pokok" class="form-control" placeholder="Masukkan gaji pokok" required>
      @error('gaji_pokok')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection