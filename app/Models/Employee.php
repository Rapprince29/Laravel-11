<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'department_id',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}

