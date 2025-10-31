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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            
            // Kolom yang seharusnya ada, sesuai Model Anda
            $table->unsignedBigInteger('employee_id'); 
            $table->string('bulan');
            $table->integer('tahun');
            $table->decimal('gaji_pokok', 10, 2); // Gunakan decimal untuk uang
            $table->decimal('tunjangan', 10, 2)->nullable()->default(0);
            $table->decimal('potongan', 10, 2)->nullable()->default(0);
            $table->decimal('total_gaji', 10, 2);

            $table->timestamps();

            // Foreign key
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade'); // Hapus gaji jika pegawai dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};