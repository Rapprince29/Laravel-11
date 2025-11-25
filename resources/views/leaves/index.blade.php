@extends('master')

@section('content')
<div class="container">
  <h2 class="mb-4">Daftar Pengajuan Cuti</h2>

  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Buat Pengajuan</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Pegawai</th>
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      @foreach($leaves as $leave)
      <tr>
        <td>{{ $leave->employee->nama_lengkap }}</td>
        <td>{{ $leave->leave_type }}</td>
        <td>
          {{ $leave->start_date->format('d M Y H:i') }} <br>
          s/d <br>
          {{ $leave->end_date->format('d M Y H:i') }}
        </td>
        <td>{{ $leave->status }}</td>
        <td>
          <a href="{{ route('leaves.show', $leave->id) }}" class="btn btn-info btn-sm">Detail</a>
          <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-warning btn-sm">Edit</a>

          <form action="{{ route('leaves.destroy', $leave->id) }}" class="d-inline" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm"
              onclick="return confirm('Hapus data ini?')">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>
</div>
@endsection