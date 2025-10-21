@extends('master')

@section('title', 'Tambah Data Gaji')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Tambah Data Gaji</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('salaries.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="karyawan_id" class="form-label">Nama Karyawan</label>
          <select name="karyawan_id" id="karyawan_id" class="form-select" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="bulan" class="form-label">Periode Gaji (Bulan)</label>
          <input type="month" name="bulan" id="bulan" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
          <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="tunjangan" class="form-label">Tunjangan</label>
          <input type="number" step="0.01" name="tunjangan" id="tunjangan" class="form-control">
        </div>

        <div class="mb-3">
          <label for="potongan" class="form-label">Potongan</label>
          <input type="number" step="0.01" name="potongan" id="potongan" class="form-control">
        </div>

        <div class="text-end">
          <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection