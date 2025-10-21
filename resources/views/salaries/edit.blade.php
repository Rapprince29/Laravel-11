@extends('master')

@section('title', 'Edit Data Gaji')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Edit Data Gaji</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="karyawan_id" class="form-label">Nama Karyawan</label>
          <select name="karyawan_id" id="karyawan_id" class="form-select" required>
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}" {{ $salary->karyawan_id == $employee->id ? 'selected' : '' }}>
              {{ $employee->nama_lengkap }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="bulan" class="form-label">Periode Gaji</label>
          <input type="month" name="bulan" id="bulan" class="form-control" value="{{ $salary->bulan }}" required>
        </div>

        <div class="mb-3">
          <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
          <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ $salary->gaji_pokok }}" required>
        </div>

        <div class="mb-3">
          <label for="tunjangan" class="form-label">Tunjangan</label>
          <input type="number" name="tunjangan" id="tunjangan" class="form-control" value="{{ $salary->tunjangan }}">
        </div>

        <div class="mb-3">
          <label for="potongan" class="form-label">Potongan</label>
          <input type="number" name="potongan" id="potongan" class="form-control" value="{{ $salary->potongan }}">
        </div>

        <div class="text-end">
          <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-warning">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection