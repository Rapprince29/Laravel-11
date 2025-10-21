@extends('master')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">👥 Daftar Pegawai</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-success shadow-sm">
      <i class="bi bi-plus-circle"></i> Tambah Pegawai
    </a>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif

  <div class="card shadow-sm border-0">
    <div class="card-body table-responsive">
      <table class="table table-hover align-middle text-center">
        {{-- Warna Header Disesuaikan --}}
        <thead style="background-color:#2e7d32; color:white;">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tanggal Masuk</th>
            <th>Status</th>
            <th>Departemen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($employees as $index => $employee)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td class="fw-semibold">{{ $employee->nama_lengkap }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->nomor_telepon }}</td>
            <td>{{ $employee->tanggal_lahir }}</td>
            <td>{{ $employee->alamat }}</td>
            <td>{{ $employee->tanggal_masuk }}</td>
            <td>
              <span class="badge bg-{{ $employee->status == 'aktif' ? 'success' : 'secondary' }}">
                {{ ucfirst($employee->status) }}
              </span>
            </td>
            <td>{{ $employee->department->nama_department ?? 'Tidak Ada' }}</td>
            <td>
              <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm text-white shadow-sm">
                  <i class="bi bi-eye">Show</i>
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm text-white shadow-sm">
                  <i class="bi bi-pencil-square">Edit</i>
                </a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                    <i class="bi bi-trash">Delete</i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="10" class="text-muted">Tidak ada data pegawai.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">{{ $employees->links() }}</div>
</div>
@endsection