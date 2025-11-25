@extends('master')

@section('content')
<div class="container">
  <h2 class="mb-4">Buat Pengajuan Cuti</h2>

  <form action="{{ route('leaves.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Pegawai</label>
      <select name="employee_id" class="form-control">
        @foreach($employees as $emp)
        <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Jenis Cuti</label>
      <input type="text" class="form-control" name="leave_type">
    </div>

    <div class="mb-3">
      <label>Tanggal Mulai</label>
      <input type="datetime-local" class="form-control" name="start_date">
    </div>

    <div class="mb-3">
      <label>Tanggal Selesai</label>
      <input type="datetime-local" class="form-control" name="end_date">
    </div>

    <div class="mb-3">
      <label>Alasan</label>
      <textarea name="reason" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection