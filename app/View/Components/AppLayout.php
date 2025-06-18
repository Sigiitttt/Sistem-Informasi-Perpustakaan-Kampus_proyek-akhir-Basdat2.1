<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth; // <-- Import Auth
use App\Models\PeminjamanHeader;    // <-- Import Model

class AppLayout extends Component
{
    public $notifikasiJatuhTempo; // <-- Buat properti publik baru

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Defaultnya kosong
        $this->notifikasiJatuhTempo = collect(); 

        // Jika user sudah login
        if (Auth::check()) {
            // Jalankan query untuk mencari notifikasi
            $this->notifikasiJatuhTempo = PeminjamanHeader::where('user_id', Auth::id())
                ->where('status_peminjaman', 'Dipinjam')
                // Cari yang tanggal wajib kembalinya antara hari ini dan 3 hari ke depan
                ->whereBetween('tgl_wajib_kembali', [now()->toDateString(), now()->addDays(3)->toDateString()])
                ->with('details.buku') // Ambil juga detail buku untuk ditampilkan
                ->get();
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}