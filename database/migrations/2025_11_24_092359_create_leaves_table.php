<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();

            // 1. RELASI (PENTING)
            // Pastikan tabel 'employees' SUDAH ADA sebelum migrasi ini dijalankan.
            // onDelete('cascade') artinya: Jika data pegawai dihapus, data cutinya ikut terhapus otomatis.
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->onDelete('cascade');

            // 2. DATA UTAMA
            $table->string('leave_type'); // Jenis: Sakit, Izin, Tahunan
            $table->date('start_date');
            $table->date('end_date');

            // 3. ALASAN
            // Dibuat nullable agar database fleksibel, meski di Controller kita set required.
            $table->text('reason')->nullable();

            // 4. STATUS
            // Default 'pending' agar saat create tidak perlu isi status manual.
            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
