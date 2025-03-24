<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class layanan_siswa extends Model
{
    use HasFactory;

    protected $table = 'layanan_siswa';
    protected $primaryKey='nisn';
    protected $fillable = ['nisn', 'nama_siswa'];
    public function peminjaman()
    {
        return $this->hasMany(layanan_peminjaman::class, 'nisn', 'nisn'); // Adjust if necessary
    }
}
