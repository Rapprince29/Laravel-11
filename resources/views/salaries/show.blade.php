@extends('master')

@section('title', 'Detail Gaji Karyawan')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Detail Gaji Karyawan</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Nama Karyawan</th>
          <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
          <th>Bulan</th>
          <td>{{ $salary->bulan }}</td>
        </tr>
        <tr>
          <th>Gaji Pokok</th>
          <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
          <th>Tunjangan</th>
          <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
        </tr>
        <tr>
          <th>Potongan</th>
          <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
          <th>Total Gaji</th>
          <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
        </tr>
      </table>

      <div class="text-end">
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">Edit</a>
      </div>
    </div>
  </div>
</div>
@endsection