@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">✏️ Edit Data Departemen</h2>

  <form action="{{ route('departments.update', $department->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Departemen</label>
      <input type="text" name="nama" value="{{ $department->nama_departemen }}" class="form-control" required>
      @error('nama')
      <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-warning text-white">Update</button>
    </div>
  </form>
</div>
@endsection