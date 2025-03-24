<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    public $timestamps = false; 
    protected $fillable = [
        'aktivitas',
        'tautan',
        'metode',
        'id_pengguna',
        'alamat_ip'
    ];

   // Nonaktifkan timestamps default
}