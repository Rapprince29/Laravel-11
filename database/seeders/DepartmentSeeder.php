<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
  /**
   * Jalankan seeder untuk tabel departments.
   */
  public function run(): void
  {
    DB::table('departments')->insert([
      [
        'nama_department' => 'Teknologi Informasi',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama_department' => 'Keuangan',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama_department' => 'Sumber Daya Manusia',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama_department' => 'Pemasaran',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama_department' => 'Produksi',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
