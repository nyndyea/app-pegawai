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
        // Kode yang BENAR untuk MEMBUAT tabel employees
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Membuat Primary Key 'id'
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->timestamps(); // Membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};