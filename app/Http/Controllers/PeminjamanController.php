<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PeminjamanHeader;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function store(Request $request, Buku $buku)
    {
        // 1. Validasi: Cek apakah stok masih ada
        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Maaf, stok buku ini telah habis.');
        }

        $user = Auth::user();

        // 2. Validasi: Cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
        $peminjamanAktif = PeminjamanHeader::where('user_id', $user->id)
            ->where('status_peminjaman', 'Dipinjam')
            ->whereHas('details', function ($query) use ($buku) {
                $query->where('id_buku', $buku->id_buku);
            })->exists();

        if ($peminjamanAktif) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini dan belum dikembalikan.');
        }

        // 3. Proses Peminjaman menggunakan Transaksi
        try {
            DB::transaction(function () use ($user, $buku) {
                // Buat header peminjaman
                $header = PeminjamanHeader::create([
                    'user_id' => $user->id,
                    'tgl_pinjam' => Carbon::now(),
                    'tgl_wajib_kembali' => Carbon::now()->addDays(7), // Durasi 7 hari
                    'status_peminjaman' => 'Dipinjam',
                ]);

                // Buat detail peminjaman
                PeminjamanDetail::create([
                    'id_pinjam' => $header->id_pinjam,
                    'id_buku' => $buku->id_buku,
                ]);

                // Trigger di database akan otomatis mengurangi stok
            });

            return redirect()->route('riwayat')->with('success', 'Buku berhasil dipinjam! Mohon kembalikan sebelum tanggal jatuh tempo.');
        } catch (\Exception $e) {
            // Tampilkan pesan error yang sebenarnya untuk debugging
            dd($e->getMessage());
        }
    }
}
