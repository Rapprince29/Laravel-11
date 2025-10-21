@extends('master')

@section('title', 'Form Input Pegawai')

@section('content')
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header text-white text-center fw-bold" style="background-color:#006eff;">
      Form Input Pegawai
    </div>
    <div class="card-body">
      <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nomor Telepon</label>
          <input type="text" name="nomor_telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Masuk</label>
          <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Department</label>
          <select name="department_id" class="form-select" required>
            <option value="">-- Pilih Department --</option>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->nama_department }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select" required>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
          </select>
        </div>

        <div class="d-flex justify-content-end">
          <button type="reset" class="btn btn-secondary me-2">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection