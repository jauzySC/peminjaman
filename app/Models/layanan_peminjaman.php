<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class layanan_peminjaman extends Model
{
    use HasFactory;

    protected $table = 'layanan_peminjaman';
    protected $primaryKey = 'id_peminjaman';

    public $timestamps = false;
    // Define the relationship to layanan_barang
    public function barang(): BelongsTo
    {
        return $this->belongsTo(layanan_barang::class, 'id_barang', 'id_barang');
    }

    // Define the relationship to layanan_siswa
    // app/Models/layanan_peminjaman.php
public function siswa(): BelongsTo
{
    return $this->belongsTo(
        layanan_siswa::class, 
        'nisn', // foreign key
        'nisn'  // Primary key
    );
}

    protected $fillable = [
        'nisn', 
        'id_barang', 
        'tanggal_pengembalian'
    ];
}