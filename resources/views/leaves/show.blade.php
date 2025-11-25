@extends('master')

@section('content')
<div class="container">
  <h1>Detail Pengajuan Cuti</h1>

  <table class="table table-bordered">
    <tr>
      <th>Pegawai</th>
      <td>{{ $leave->employee->nama_lengkap }}</td>
    </tr>
    <tr>
      <th>Jenis Cuti</th>
      <td>{{ $leave->leave_type }}</td>
    </tr>
    <tr>
      <th>Tanggal Mulai</th>
      <td>{{ $leave->start_date->format('d F Y H:i') }}</td>
    </tr>
    <tr>
      <th>Tanggal Selesai</th>
      <td>{{ $leave->end_date->format('d F Y H:i') }}</td>
    </tr>
    <tr>
      <th>Alasan</th>
      <td>{{ $leave->reason }}</td>
    </tr>
    <tr>
      <th>Status</th>
      <td>
        <span class="badge bg-info text-dark">{{ $leave->status }}</span>
      </td>
    </tr>
  </table>

  <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection