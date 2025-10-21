@extends('master')

@section('title', 'Detail Gaji Karyawan')

@section('content')
<div class="container py-4">
  <h2 class="mb-4"><i class="fa-solid fa-wallet me-2"></i> Detail Gaji Karyawan</h2>

  <div class="card shadow-sm p-4">
    
    <table class="table table-borderless" style="border-collapse: separate; border-spacing: 0 5px;">
      <tbody>
      
        <tr>
          <th style="width: 30%; background-color: var(--main-purple); color: white; padding: 10px; border-radius: 8px 0 0 0;">Nama Karyawan</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $salary->employee->nama_lengkap ?? '-' }}</td>
        </tr>
        
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Bulan & Tahun</th>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $salary->bulan ?? '-' }} {{ $salary->tahun ?? '' }}</td>
        </tr>
        
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Gaji Pokok</th>
          
          <td style="padding: 10px; border-bottom: 1px solid #eee;">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Tunjangan</th>
          
          <td style="padding: 10px; border-bottom: 1px solid #eee;">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
        </tr>
        
        <tr>
          <th style="background-color: var(--main-purple); color: white; padding: 10px;">Potongan</th>
          
          <td style="padding: 10px; border-bottom: 1px solid #eee; color: #DC143C;">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
        </tr>
        
        <tr style="font-size: 1.1em; font-weight: bold;">
          <th style="background-color: var(--light-purple); color: white; padding: 12px; border-radius: 0 0 0 8px;">TOTAL Gaji Bersih</th>
          <td style="padding: 12px; border-radius: 0 8px 8px 0; background-color: white; color: var(--main-purple); border: 2px solid var(--light-purple);">
            Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
          </td>
        </tr>
      </tbody>
    </table>

    
    <div class="mt-3 d-flex justify-content-end gap-2">
      <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning text-white">Edit</a>
    </div>
  </div>
</div>
@endsection