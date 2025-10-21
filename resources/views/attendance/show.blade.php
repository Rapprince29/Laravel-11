@extends('master')

@section('title', 'Detail Kehadiran')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">👁️ Detail Kehadiran</h2>

  <div class="card shadow-sm p-4">
    <table class="table table-borderless">
      <tr>
        <th>Nama Karyawan</th>
        <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td>{{ $attendance->tanggal }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>
          <span class="badge bg-{{ $attendance->status == 'hadir' ? 'success' : ($attendance->status == 'izin' ? 'warning' : ($attendance->status == 'sakit' ? 'info' : 'danger')) }}">
            {{ ucfirst($attendance->status) }}
          </span>
        </td>
      </tr>
      <tr>
        <th>Waktu Masuk</th>
        <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
      </tr>
      <tr>
        <th>Waktu Keluar</th>
        <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td>{{ $attendance->keterangan ?? '-' }}</td>
      </tr>
    </table>

    <div class="mt-3 d-flex justify-content-end gap-2">
      <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning text-white">Edit</a>
    </div>
  </div>
</div>
@endsection