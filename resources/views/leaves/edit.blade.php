@extends('master')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Edit Pengajuan Cuti</h2>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Kembali</a>
  </div>

  <form action="{{ route('leaves.update', $leave) }}" method="POST">
    @csrf
    @method('PUT') {{-- Method PUT wajib untuk Update --}}

    <div class="card shadow-sm border-0 p-4">

      {{-- INFO PENTING: Pegawai biasanya tidak boleh diubah saat Edit Cuti --}}
      {{-- Namun jika ingin diubah, pastikan logic select option benar --}}
      <div class="mb-3">
        <label class="fw-bold mb-1">Nama Pegawai</label>
        <select name="employee_id" class="form-select">
          @foreach($employees as $employee)
          <option value="{{ $employee->id }}"
            {{-- LOGIKA: Jika ID di database Cuti == ID Pegawai loop, maka Selected --}}
            {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>

            {{-- KONSISTENSI: Gunakan nama_lengkap --}}
            {{ $employee->nama_lengkap }} ({{ $employee->department->nama_department ?? '-' }})
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="fw-bold mb-1">Jenis Cuti</label>
        <select name="leave_type" class="form-select">
          {{-- Array logika untuk mengecek tipe cuti --}}
          @foreach(['Sakit', 'Izin', 'Tahunan', 'Melahirkan'] as $type)
          <option value="{{ $type }}" {{ $leave->leave_type == $type ? 'selected' : '' }}>
            {{ $type == 'Tahunan' ? 'Cuti Tahunan' : $type }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="fw-bold mb-1">Tanggal Mulai</label>
          <input type="date" name="start_date" class="form-control"
            value="{{ $leave->start_date }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="fw-bold mb-1">Tanggal Selesai</label>
          <input type="date" name="end_date" class="form-control"
            value="{{ $leave->end_date }}" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="fw-bold mb-1">Alasan</label>
        <textarea name="reason" class="form-control" rows="3">{{ $leave->reason }}</textarea>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <button type="reset" class="btn btn-light border">Reset</button>
        <button type="submit" class="btn btn-primary px-4">
          <i class="fa-solid fa-save me-1"></i> Update Perubahan
        </button>
      </div>
    </div>
  </form>
</div>
@endsection
<script>
  // Logika sederhana: Tanggal Selesai tidak boleh sebelum Tanggal Mulai
  const startInput = document.querySelector('input[name="start_date"]');
  const endInput = document.querySelector('input[name="end_date"]');

  startInput.addEventListener('change', function() {
    // Saat tanggal mulai dipilih, set min tanggal selesai ke tanggal tersebut
    endInput.min = this.value;

    // Jika tanggal selesai saat ini lebih kecil, reset
    if (endInput.value && endInput.value < this.value) {
      endInput.value = this.value;
    }
  });
</script>