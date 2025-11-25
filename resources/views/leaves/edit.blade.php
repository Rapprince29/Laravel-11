@extends('master')

@section('content')
<div class="container">
  <h1>Edit Pengajuan Cuti</h1>

  <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Pegawai</label>
      <select name="employee_id" class="form-control">
        @foreach($employees as $emp)
        <option value="{{ $emp->id }}" {{ $leave->employee_id == $emp->id ? 'selected' : '' }}>
          {{ $emp->nama_lengkap }}
        </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Jenis Cuti</label>
      <input type="text" name="leave_type" value="{{ $leave->leave_type }}" class="form-control">
    </div>

    <div class="mb-3">
      <label>Tanggal Mulai</label>
      <input type="datetime-local" name="start_date"
        value="{{ $leave->start_date->format('Y-m-d\TH:i') }}" class="form-control">
    </div>

    <div class="mb-3">
      <label>Tanggal Selesai</label>
      <input type="datetime-local" name="end_date"
        value="{{ $leave->end_date->format('Y-m-d\TH:i') }}" class="form-control">
    </div>

    <div class="mb-3">
      <label>Alasan</label>
      <textarea name="reason" class="form-control">{{ $leave->reason }}</textarea>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
        <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection