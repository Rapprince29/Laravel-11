@extends('master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">👤 Detail Pegawai</h2>

  <div class="card shadow-sm p-4">
    
    <table class="table table-borderless" style="border-collapse: separate; border-spacing: 0 5px;">
      <tbody>
        {{-- Nama Lengkap --}}
        <tr>
          <th style="width: 30%; background-color: var(--main-purple); color: white; padding: 10px; border-radius: 8px 0 0 0;">Nama Lengkap</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->nama_lengkap }}</td>
        </tr>
        {{-- Email --}}
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Email</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->email }}</td>
        </tr>
        {{-- Nomor Telepon --}}
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Nomor Telepon</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->nomor_telepon }}</td>
        </tr>
        {{-- Tanggal Lahir --}}
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Tanggal Lahir</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</td>
        </tr>
        {{-- Alamat --}}
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Alamat</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->alamat }}</td>
        </tr>
        {{-- Tanggal Masuk --}}
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Tanggal Masuk</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</td>
        </tr>
        {{-- Departemen --}}
        @if ($employee->departemen)
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Departemen</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->departemen->nama_departemen }}</td>
        </tr>
        @endif
        {{-- Jabatan --}}
        @if ($employee->jabatan)
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Jabatan</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $employee->jabatan->nama_jabatan }}</td>
        </tr>
        @endif
        
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px; border-radius: 0 0 0 8px;">Status</th>
          <td style="padding: 10px; border-radius: 0 0 8px 0; background-color: white; border: 2px solid var(--light-purple);">
            
            <span class="badge bg-{{ $employee->status == 'aktif' ? 'success' : 'danger' }}">
              {{ ucfirst($employee->status) }}
            </span>
          </td>
        </tr>
      </tbody>
    </table>

    
    <div class="mt-4 d-flex justify-content-end gap-2">
      
      <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
      
      <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning text-white">Edit</a>
    </div>
  </div>
</div>
@endsection