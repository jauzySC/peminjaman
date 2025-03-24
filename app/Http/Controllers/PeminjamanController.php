<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan_peminjaman;
use App\Models\layanan_barang;
use App\Models\layanan_siswa;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function create()
    {
        $barang = layanan_barang::all();
        $siswa = layanan_siswa::all();
        return view('create', compact('barang', 'siswa'));
    }

    public function createEdit($id_peminjaman)
    {
        $peminjaman = layanan_peminjaman::findOrFail($id_peminjaman);
        $barang = layanan_barang::all();
        return view('edit', compact('peminjaman', 'barang'));
    }

    public function storeEdit(Request $request, $id_peminjaman)
    {
        $request->validate([
            'id_barang' => 'required|exists:layanan_barang,id_barang',
            'tanggal_pengembalian' => 'required|date'
        ]);

        try {
            $peminjaman = layanan_peminjaman::findOrFail($id_peminjaman);
            $peminjaman->update($request->only(['id_barang', 'tanggal_pengembalian']));

            LogAktivitas::create([
                'id_terkait' => $id_peminjaman,
                'aktivitas' => 'Memperbarui peminjaman',
                'tautan' => $request->fullUrl(),
                'metode' => $request->method(),
               'id_pengguna' => Auth::check() ? Auth::id() : null,
                'alamat_ip' => $request->ip()
            ]);

            return redirect()->route('viewPeminjaman')->with('success', 'Data berhasil diperbarui');

        } catch (\Exception $e) {
            Log::error('Gagal memperbarui peminjaman: ' . $e->getMessage());
            return redirect()->back()->withErrors('Gagal memperbarui data');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'id_barang' => 'required|exists:layanan_barang,id_barang',
            'tanggal_pengembalian' => 'required|date'
        ]);

        try {
            $peminjaman = layanan_peminjaman::create([
                'nisn' => '00' .$request->nisn,
                'id_barang' => $request->id_barang,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
            ]);

            LogAktivitas::create([
                'id_terkait' => $peminjaman->id_peminjaman,
                'aktivitas' => 'Membuat peminjaman baru',
                'tautan' => $request->fullUrl(),
                'metode' => $request->method(),
             'id_pengguna' => Auth::check() ? Auth::id() : null,
                'alamat_ip' => $request->ip()
            ]);

            return redirect()->route('viewPeminjaman')->with('success', 'Peminjaman berhasil dibuat');

        } catch (\Exception $e) {
            Log::error('Gagal membuat peminjaman: ' . $e->getMessage());
            return redirect()->back()->withErrors('Gagal menyimpan data');
        }
    }

    public function destroy($id)
    {
        try {
            $peminjaman = layanan_peminjaman::findOrFail($id);
            $peminjaman->delete();

            LogAktivitas::create([
                'id_terkait' => $id,
                'aktivitas' => 'Menghapus peminjaman',
                'tautan' => request()->fullUrl(),
                'metode' => request()->method(),
              'id_pengguna' => Auth::check() ? Auth::id() : null,
                'alamat_ip' => request()->ip()
            ]);

            return redirect()->route('viewPeminjaman')->with('success', 'Peminjaman berhasil dihapus');

        } catch (\Exception $e) {
            Log::error('Gagal menghapus peminjaman: ' . $e->getMessage());
            return redirect()->back()->withErrors('Gagal menghapus data');
        }
    }
}