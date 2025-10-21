@extends('master')

@section('title', 'Data Jabatan')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success">💼 Data Jabatan</h2>
    <a href="{{ route('positions.create') }}" class="btn btn-success shadow-sm">
      <i class="bi bi-plus-circle"></i> Tambah Jabatan
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
            <th>Nama Jabatan</th>
            <th>Gaji Pokok (Rp)</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($positions as $index => $position)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td class="fw-semibold">{{ $position->nama_jabatan }}</td>
            <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
            <td>{{ $position->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-warning text-white shadow-sm">
                <i class="bi bi-pencil-square">Edit</i>
              </a>
              <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger shadow-sm">
                  <i class="bi bi-trash">Delete</i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-muted">Belum ada data jabatan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection