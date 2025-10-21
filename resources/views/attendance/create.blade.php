@extends('master')

@section('title', 'Tambah Kehadiran')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">📝 Tambah Data Kehadiran</h2>

  <form action="{{ route('attendances.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Karyawan</label>
      <select name="employee_id" class="form-select" required>
        <option value="">-- Pilih Karyawan --</option>
        @foreach ($employees as $employee)
        <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Status Kehadiran</label>
      <select name="status" class="form-select" required>
        <option value="">-- Pilih Status --</option>
        @foreach ($statuses as $status)
        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
        @endforeach
      </select>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Masuk</label>
        <input type="time" name="waktu_masuk" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Keluar</label>
        <input type="time" name="waktu_keluar" class="form-control">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3"></textarea>
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection