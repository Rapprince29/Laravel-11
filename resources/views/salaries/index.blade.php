@extends('master')

@section('title', 'Data Gaji Karyawan')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">💰 Data Gaji Karyawan</h2>
    <a href="{{ route('salaries.create') }}" class="btn btn-success shadow-sm">
      <i class="bi bi-plus-circle"></i> Tambah Gaji
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
            <th>#</th>
            <th>Nama Karyawan</th>
            <th>Bulan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($salaries as $salary)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
            <td>{{ $salary->bulan }}</td>
            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
            <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
            <td>
              <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info btn-sm text-white shadow-sm">
                <i class="bi bi-eye">Show</i>
              </a>
              <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm text-white shadow-sm">
                <i class="bi bi-pencil-square">Edit</i>
              </a>
              <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm shadow-sm"><i class="bi bi-trash">Delete</i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-muted">Belum ada data gaji.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection