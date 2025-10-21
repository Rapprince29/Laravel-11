@extends('master')

@section('title', 'Detail Jabatan')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">👁️ Detail Jabatan</h2>

  <div class="card p-4 shadow-sm">
    <table class="table table-borderless">
      <tr>
        <th>Nama Jabatan</th>
        <td>{{ $position->nama_jabatan }}</td>
      </tr>
      <tr>
        <th>Gaji Pokok</th>
        <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
      </tr>
      <tr>
        <th>Dibuat Pada</th>
        <td>{{ $position->created_at->format('d M Y, H:i') }}</td>
      </tr>
    </table>

    <div class="d-flex justify-content-end gap-2 mt-3">
      <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning text-white">Edit</a>
    </div>
  </div>
</div>
@endsection