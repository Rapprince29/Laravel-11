<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    // Relasi ke Pegawai
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // HAPUS function department() dari sini. 
    // Function itu harusnya ada di file app/Models/Employee.php
}
