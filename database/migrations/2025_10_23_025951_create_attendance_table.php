<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            
            $table->id();
            
            // Diubah agar sesuai dengan Model Anda
            $table->unsignedBigInteger('employee_id'); 
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            
            // 'status_absensi' adalah nama yang bagus, kita pertahankan
            $table->enum('status_absensi', ['hadir', 'izin', 'sakit', 'alpha']);
            
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('employee_id') // Diubah
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Perbaiki bug (attendance -> attendances)
        Schema::dropIfExists('attendances');
    }
};