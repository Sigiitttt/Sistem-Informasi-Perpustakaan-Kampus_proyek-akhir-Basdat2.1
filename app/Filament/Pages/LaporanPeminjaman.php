<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class LaporanPeminjaman extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static string $view = 'filament.pages.laporan-peminjaman';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $title = 'Laporan Peminjaman';
    protected static ?string $navigationLabel = 'Laporan Peminjaman';

    // Kita siapkan properti untuk menampung data laporan
    public $bukuTerpopuler;
    public $anggotaTeraktif;
    public $peminjamanTerbaru;

    // Method mount() berjalan saat halaman pertama kali dimuat
    public function mount(): void
    {
        // 1. Query untuk mengambil 10 buku terpopuler
        $this->bukuTerpopuler = DB::table('peminjaman_detail')
            ->join('buku', 'peminjaman_detail.id_buku', '=', 'buku.id_buku')
            ->select('buku.judul', DB::raw('count(peminjaman_detail.id_buku) as jumlah_dipinjam'))
            ->groupBy('buku.judul')
            ->orderBy('jumlah_dipinjam', 'desc')
            ->limit(10)
            ->get();

        // 2. Query untuk mengambil 10 anggota teraktif
        $this->anggotaTeraktif = DB::table('peminjaman_header')
            ->join('users', 'peminjaman_header.user_id', '=', 'users.id')
            ->select('users.name as nama_anggota', DB::raw('count(peminjaman_header.user_id) as jumlah_pinjam'))
            ->groupBy('users.name')
            ->orderBy('jumlah_pinjam', 'desc')
            ->limit(10)
            ->get();
            
        // 3. Query untuk mengambil 10 transaksi terakhir (menggunakan VIEW kita)
        $this->peminjamanTerbaru = DB::table('V_RiwayatPeminjamanLengkap')
            ->orderBy('tgl_pinjam', 'desc')
            ->limit(10)
            ->get();
    }
}