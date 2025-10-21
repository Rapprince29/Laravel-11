  @extends('master')

  @section('title', 'Data Departemen')

  @section('content')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-success">🏢 Data Departemen</h2>
      <a href="{{ route('departments.create') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle"></i> Tambah Departemen
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
              <th>Nama Departemen</th>
              <th>Dibuat Pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($departments as $index => $department)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td class="fw-semibold">{{ $department->nama_department }}</td>
              <td>{{ $department->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm text-white shadow-sm">
                  <i class="bi bi-pencil-square">Edit</i>
                </a>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm shadow-sm">
                    <i class="bi bi-trash">Delete</i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-muted">Belum ada data departemen.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection