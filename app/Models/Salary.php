<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['karyawan_id', 'gaji_pokok', 'tunjangan', 'periode_gaji', 'tanggal_pembayaran', 'potongan', 'total_gaji', 'bulan'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
