@extends('master')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Pengajuan Cuti</h2>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Kembali</a>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <div class="row">

        {{-- KOLOM KIRI (Data Pegawai) --}}
        <div class="col-md-7">
          <h4 class="text-primary fw-bold">
            {{ $leave->employee?->nama_lengkap ?? 'Pegawai Tidak Ditemukan' }}
          </h4>
          <p class="text-muted mb-4">
            {{ $leave->employee?->department?->nama_department ?? '-' }}
          </p>

          <table class="table table-borderless">
            <tr>
              <th width="35%">Jenis Cuti</th>
              <td>: <span class="badge bg-info text-dark">{{ $leave->leave_type }}</span></td>
            </tr>
            <tr>
              <th>Tanggal</th>
              <td>:
                {{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }} s/d
                {{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}
              </td>
            </tr>
            <tr>
              <th>Alasan</th>
              <td>: {{ $leave->reason }}</td>
            </tr>
          </table>
        </div>

        {{-- KOLOM KANAN (Panel Admin) --}}
        <div class="col-md-5 border-start">
          <div class="p-3 bg-light rounded">
            <h5 class="text-center mb-3 fw-bold">Panel Aksi Admin</h5>

            {{-- Status --}}
            <div class="text-center mb-4">
              @if($leave->status == 'pending')
              <span class="badge bg-warning text-dark fs-5">Status: Menunggu</span>
              @elseif($leave->status == 'approved')
              <span class="badge bg-success fs-5">Status: Disetujui</span>
              @else
              <span class="badge bg-danger fs-5">Status: Ditolak</span>
              @endif
            </div>

            {{-- Tombol Verify (Approve/Reject) --}}
            @if($leave->status == 'pending')
            <div class="row g-2 mb-3">
              <div class="col-6">
                {{-- PERBAIKAN ROUTE: Gunakan object $leave langsung, lebih aman --}}
                <form action="{{ route('leaves.verify', $leave) }}" method="POST">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="approved">
                  <button type="submit" class="btn btn-success w-100">
                    <i class="fa-solid fa-check"></i> Setujui
                  </button>
                </form>
              </div>
              <div class="col-6">
                <form action="{{ route('leaves.verify', $leave) }}" method="POST">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="rejected">
                  <button type="submit" class="btn btn-danger w-100">
                    <i class="fa-solid fa-xmark"></i> Tolak
                  </button>
                </form>
              </div>
            </div>
            <hr>
            @endif

            {{-- Tombol Edit & Hapus --}}
            <div class="d-grid gap-2">
              {{-- PERBAIKAN ERROR LINK EDIT --}}
              {{-- Gunakan $leave->id secara eksplisit --}}
              <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-warning text-white">
                <i class="fa-solid fa-pen-to-square"></i> Edit Data
              </a>

              {{-- PERBAIKAN FORM HAPUS --}}
              <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" onsubmit="return confirm('Hapus data ini permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger w-100">
                  <i class="fa-solid fa-trash"></i> Hapus Data
                </button>
              </form>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection