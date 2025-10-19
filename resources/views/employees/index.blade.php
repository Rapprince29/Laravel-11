@extends('employees.master')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary">Daftar Pegawai</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Tambah Pegawai
    </a>
  </div>

  <!-- Pesan sukses (jika ada) -->
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive shadow-sm rounded-3">
    <table class="table table-bordered align-middle">
      <thead class="table-primary text-center">
        <tr>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Nomor Telepon</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
          <th>Departemen</th>
          <th width="150">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @forelse($employees as $employee)
        <tr>
          <td>{{ $employee->nama_lengkap }}</td>
          <td>{{ $employee->email }}</td>
          <td>{{ $employee->nomor_telepon }}</td>
          <td>{{ $employee->tanggal_lahir }}</td>
          <td>{{ $employee->alamat }}</td>
          <td>{{ $employee->tanggal_masuk }}</td>
          <td>
            <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
              {{ ucfirst($employee->status) }}
            </span>
          </td>
          <td>{{ $employee->department->nama_department ?? 'Tidak Ada' }}</td>
          <td class="text-center">
            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info text-white mb-1">
              <i class="bi bi-eye"></i>
            </a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning text-white mb-1">
              <i class="bi bi-pencil-square"></i>
            </a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
                <i class="bi bi-trash3"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="9" class="text-center text-muted py-4">Tidak ada data pegawai</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $employees->links() }} <!-- pagination Laravel -->
  </div>
</div>
@endsection
