@extends('master')

@section('title', 'Edit Kehadiran')

@section('content')
<div class="container py-4">
  {{-- Mengubah H2 agar mengikuti warna ungu di master.blade.php --}}
  <h2 class="mb-4 fw-bold text-success">✏️ Edit Data Kehadiran</h2>

  <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="card p-4 shadow-sm border-0">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Karyawan</label>
      <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
        @foreach ($employees as $employee)
        <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
          {{ $employee->nama_lengkap }}
        </option>
        @endforeach
      </select>
      @error('employee_id')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror" required>
      @error('tanggal')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Status Kehadiran</label>
      <select name="status" class="form-select @error('status') is-invalid @enderror" required>
        @foreach ($statuses as $status)
        <option value="{{ $status }}" {{ old('status', $attendance->status) == $status ? 'selected' : '' }}>
          {{ ucfirst($status) }}
        </option>
        @endforeach
      </select>
      @error('status')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Masuk</label>
        {{-- Format waktu 24 jam untuk input time --}}
        <input type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" class="form-control @error('waktu_masuk') is-invalid @enderror">
        @error('waktu_masuk')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Waktu Keluar</label>
        {{-- Format waktu 24 jam untuk input time --}}
        <input type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}" class="form-control @error('waktu_keluar') is-invalid @enderror">
        @error('waktu_keluar')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $attendance->keterangan) }}</textarea>
      @error('keterangan')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex justify-content-end gap-2">
      <a href="{{ route('attendances.index') }}" class="btn btn-secondary shadow-sm">Batal</a>
      {{-- Mengganti btn-warning menjadi btn-info yang berwarna ungu tua --}}
      <button type="submit" class="btn btn-info shadow-sm">Update</button>
    </div>
  </form>
</div>
@endsection