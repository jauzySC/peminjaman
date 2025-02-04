<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class layanan_peminjaman extends Model
{
   use HasFactory;

   protected $table ='layanan_peminjaman';
   protected $fillable = ['nisn','id_barang'];
   protected $primaryKey= 'id_peminjaman';
   public $incrementing = true;
   protected $keyType= 'int';
   
 public $timestamps = false;

   public function barang()
   {
    return $this->belongsTo(Layanan_barang::class,'id_barang');
   }
   public function siswa()
{
    return $this->belongsTo(Layanan_siswa::class, 'nisn', 'nisn');
}

}
