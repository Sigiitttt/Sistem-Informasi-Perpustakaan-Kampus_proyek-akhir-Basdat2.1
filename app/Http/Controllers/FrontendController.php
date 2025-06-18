<?php

namespace App\Http\Controllers;

use App\Models\Buku; // Import model Buku
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB Facade untuk query builder
use Illuminate\Support\Facades\Auth; // Import Auth Facade untuk mendapatkan user yg login
use App\Models\PeminjamanHeader;


class FrontendController extends Controller
{
    /**
     * Menampilkan halaman katalog buku.
     */
    public function katalog(Request $request) // <-- Tambahkan Request $request
{
    // Mulai query, tapi jangan langsung get()
    $query = Buku::query();

    // Cek apakah ada input pencarian di URL
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        // Tambahkan kondisi WHERE untuk mencari di kolom judul ATAU penulis
        $query->where(function($q) use ($searchTerm) {
            $q->where('judul', 'like', "%{$searchTerm}%")
              ->orWhere('penulis', 'like', "%{$searchTerm}%");
        });
    }

    // Setelah query selesai dibangun, baru kita ambil datanya dengan paginasi
    $daftar_buku = $query->latest()->paginate(12)->withQueryString();

    return view('katalog', compact('daftar_buku'));
}

    /**
     * Menampilkan halaman riwayat peminjaman user yang sedang login.
     */
    public function riwayat()
    {
        // Menggunakan VIEW `V_RiwayatPeminjamanLengkap` yang sudah kita buat
        $riwayat_peminjaman = DB::table('V_RiwayatPeminjamanLengkap')
                                ->where('user_id', Auth::id()) // Filter berdasarkan ID user yang login
                                ->orderBy('tgl_pinjam', 'desc') // Urutkan dari peminjaman terbaru
                                ->get();

        return view('riwayat', compact('riwayat_peminjaman'));
    }

    public function show(Buku $buku)
    {
        // Laravel otomatis menemukan data buku berdasarkan {buku} di URL
        return view('buku_detail', compact('buku'));
    }

     public function dashboard()
    {
        $user = Auth::user();

        // Ambil semua peminjaman yang masih berstatus 'Dipinjam'
        $peminjamanAktif = PeminjamanHeader::where('user_id', $user->id)
            ->where('status_peminjaman', 'Dipinjam')
            ->with('details.buku')
            ->get();

        // Hitung jumlah peminjaman yang sudah lewat jatuh tempo
        $peminjamanOverdueCount = $peminjamanAktif
            ->where('tgl_wajib_kembali', '<', now()->toDateString())
            ->count();

        // Kirim semua data ke view 'dashboard'
        return view('dashboard', [
            'user' => $user,
            'peminjamanAktif' => $peminjamanAktif,
            'peminjamanOverdueCount' => $peminjamanOverdueCount,
        ]);
    }
}