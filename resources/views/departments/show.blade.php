@extends('master')

@section('title', 'Detail Departemen')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">👁️ Detail Departemen</h2>

  <div class="card shadow-sm p-4">
    <table class="table table-borderless">
      <tr>
        <th>Nama Departemen</th>
        <td>{{ $department->nama_departemen }}</td>
      </tr>
      <tr>
        <th>Tanggal Dibuat</th>
        <td>{{ $department->created_at->format('d M Y, H:i') }}</td>
      </tr>
    </table>

    <div class="mt-3 d-flex justify-content-end gap-2">
      <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning text-white">Edit</a>
    </div>
  </div>
</div>
@endsection