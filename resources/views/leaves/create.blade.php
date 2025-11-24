@extends('master')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Form Pengajuan Cuti</h2>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Kembali</a>
  </div>

  <form action="{{ route('leaves.store') }}" method="POST">
    @csrf
    <div class="card shadow-sm border-0 p-4">

      {{-- BAGIAN NAMA PEGAWAI --}}
      <div class="mb-3">
        <label class="fw-bold mb-1">Nama Pegawai</label>
        <select name="employee_id" class="form-select">
          {{-- Opsi Default --}}
          <option value="" disabled {{ !isset($selected_employee) ? 'selected' : '' }}>-- Pilih Pegawai --</option>

          {{-- Loop data pegawai dari Database --}}
          @foreach($employees as $employee)
          <option value="{{ $employee->id }}"
            {{-- LOGIKA: Jika ID pegawai sama dengan yang dikirim dari tombol pesawat, otomatis pilih --}}
            {{ (isset($selected_employee) && $selected_employee == $employee->id) ? 'selected' : '' }}>

            {{-- PERBAIKAN DI SINI: Gunakan 'nama_lengkap' bukan 'name' --}}
            {{ $employee->nama_lengkap }} ({{ $employee->department->nama_department ?? '-' }})
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="fw-bold mb-1">Jenis Cuti</label>
        <select name="leave_type" class="form-select">
          <option value="Sakit">Sakit</option>
          <option value="Izin">Izin</option>
          <option value="Tahunan">Cuti Tahunan</option>
          <option value="Melahirkan">Melahirkan</option>
        </select>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="fw-bold mb-1">Tanggal Mulai</label>
          <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="fw-bold mb-1">Tanggal Selesai</label>
          <input type="date" name="end_date" class="form-control" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="fw-bold mb-1">Alasan</label>
        <textarea name="reason" class="form-control" rows="3" placeholder="Contoh: Sakit demam / Acara keluarga..."></textarea>
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">
          <i class="fa-solid fa-save me-1"></i> Simpan Pengajuan
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