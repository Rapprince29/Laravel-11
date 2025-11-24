@extends('master')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Daftar Cuti Pegawai</h2>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary shadow-sm">
      <i class="fa-solid fa-plus"></i> Ajukan Cuti Baru
    </a>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="bg-light">
            <tr>
              <th class="px-4 py-3">No</th>
              <th class="py-3">Nama Pegawai</th>
              <th class="py-3">Jenis Cuti</th>
              <th class="py-3">Tanggal</th>
              <th class="py-3">Status</th>
              <th class="py-3 text-end px-4">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($leaves as $leave)
            <tr>
              <td class="px-4">{{ $loop->iteration }}</td>
              <td>
                {{-- PERBAIKAN: Konsisten pakai nama_lengkap & department --}}
                <div class="fw-bold">{{ $leave->employee->nama_lengkap ?? 'Pegawai Terhapus' }}</div>
                <small class="text-muted">{{ $leave->employee->department->nama_department ?? '-' }}</small>
              </td>
              <td><span class="badge bg-info text-dark">{{ $leave->leave_type }}</span></td>
              <td>
                <small>
                  {{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }} <br>
                  s/d {{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}
                </small>
              </td>
              <td>
                @if($leave->status == 'approved')
                <span class="badge bg-success rounded-pill">Disetujui</span>
                @elseif($leave->status == 'rejected')
                <span class="badge bg-danger rounded-pill">Ditolak</span>
                @else
                <span class="badge bg-warning text-dark rounded-pill">Menunggu</span>
                @endif
              </td>
              <td class="text-end px-4">
                <div class="btn-group">
                  <a href="{{ route('leaves.show', $leave->id) }}" class="btn btn-sm btn-outline-primary" title="Detail">
                    <i class="fa-solid fa-eye"></i>
                  </a>

                  @if($leave->status == 'pending')
                  <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengajuan ini?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                  @endif
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center py-5 text-muted">
                <i class="fa-solid fa-box-open fa-3x mb-3"></i>
                <p>Belum ada data pengajuan cuti.</p>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection