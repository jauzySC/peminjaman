<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan_barang;
use App\Models\layanan_siswa;
use App\Models\layanan_peminjaman;
use Illuminate\Support\Facades\Log;
class System extends Controller

{
    public function viewBarang() {
        $barang = layanan_barang::all();
        return view('barang', compact('barang'));
    }

    public function viewSiswa() {
$siswa = layanan_siswa::all();
return view('siswa', compact('siswa'));
    }
    public function viewPeminjaman()
{
    $peminjaman = layanan_peminjaman::all();
    
    return view('peminjaman', ['peminjaman' => $peminjaman]);
}
}
