<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan_peminjaman;
use App\Models\layanan_barang;
use App\Models\layanan_siswa;

class PeminjamanController extends Controller
{
    // Show the form to create a new peminjaman
    public function create()
    {
        $barang = layanan_barang::all();  // Get all barang (items)
        $siswa = layanan_siswa::all();  // Get all siswa (students)

        return view('create', compact('barang', 'siswa'));
    }

    // Store the peminjaman data
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nisn' => 'required',
            'id_barang' => 'required',
        ]);
       

        // Create the peminjaman record
        layanan_peminjaman::create([
            'nisn' => $request->nisn,
            'id_barang' => $request->id_barang,
        ]);

        // Redirect back to the peminjaman list or a success page
        return redirect()->route('viewPeminjaman');
    }

    public function destroy($id)
    {
        // Delete the specified row
        layanan_peminjaman::where('id_peminjaman', $id)->delete();

        // Reassign IDs sequentially
        $allPeminjaman = layanan_peminjaman::orderBy('id_peminjaman')->get();
        $newId = 1;

        foreach ($allPeminjaman as $peminjaman) {
            $peminjaman->id_peminjaman = $newId;
            $peminjaman->save();
            $newId++;
        }

        // Reset AUTO_INCREMENT value
        \DB::statement("ALTER TABLE layanan_peminjaman AUTO_INCREMENT = $newId");

        // Redirect or return response
        return redirect()->route('viewPeminjaman')->with('success', 'Peminjaman deleted and IDs updated!');
    }
}

