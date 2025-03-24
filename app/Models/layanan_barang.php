<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class layanan_barang extends Model
{
    use HasFactory;

    protected $table = 'layanan_barang';
  // app/Models/layanan_barang.php
protected $primaryKey = 'id_barang';
protected $fillable = ['nama_barang'];
}
