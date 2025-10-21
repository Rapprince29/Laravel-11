@extends('master')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">✏️ Edit Data Jabatan</h2>

  <form action="{{ route('positions.update', $position->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Jabatan</label>
      <input type="text" name="nama_jabatan" value="{{ $position->nama_jabatan }}" class="form-control" required>
      @error('nama_jabatan')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Gaji Pokok (Rp)</label>
      <input type="number" name="gaji_pokok" value="{{ $position->gaji_pokok }}" class="form-control" required>
      @error('gaji_pokok')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Update</button>
    </div>
  </form>
</div>
@endsection