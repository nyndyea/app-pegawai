<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'employee_id',
        'tanggal',
        'status_absensi', // Diubah dari 'status'
        'jam_masuk',
        'jam_keluar',
    ];

    /**
     * Relasi ke Employee.
     * Karena kita sudah ikuti standar Laravel (employee_id),
     * kita tidak perlu tentukan foreign key lagi.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class); 
    }
}