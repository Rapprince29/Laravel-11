@extends('master')

@section('title', 'Data Kehadiran')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">📋 Data Kehadiran</h2>
    <a href="{{ route('attendances.create') }}" class="btn btn-success shadow-sm">
      <i class="bi bi-plus-circle"></i> Tambah Kehadiran
    </a>
  </div>

  @if (session('success'))
  <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
  @endif

  <div class="card shadow-sm border-0">
    <div class="card-body table-responsive">
      <table class="table table-hover align-middle text-center">
        {{-- Warna Header Disesuaikan --}}
        <thead style="background-color:#2e7d32; color:white;">
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($attendances as $index => $attendance)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
            <td>{{ $attendance->tanggal }}</td>
            <td>
              <span class="badge bg-{{ $attendance->status == 'hadir' ? 'success' : ($attendance->status == 'izin' ? 'warning' : ($attendance->status == 'sakit' ? 'info' : 'danger')) }}">
                {{ ucfirst($attendance->status) }}
              </span>
            </td>
            <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
            <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
            <td>{{ $attendance->keterangan ?? '-' }}</td>
            <td>
              <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-info btn-sm shadow-sm text-white">
                <i class="bi bi-eye">Show</i>
              </a>
              <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning btn-sm shadow-sm text-white">
                <i class="bi bi-pencil-square">Edit</i>
              </a>
              <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm shadow-sm"><i class="bi bi-trash"></i>Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-muted">Tidak ada data kehadiran.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection