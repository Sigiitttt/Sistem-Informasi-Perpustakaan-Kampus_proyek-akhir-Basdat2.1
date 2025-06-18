<?php

namespace App\Filament\Widgets; // Atau App\Filament\Admin\Widgets, sesuaikan dengan lokasi file Anda

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Buku;
use App\Models\PeminjamanHeader;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Di sinilah kita mendefinisikan 4 kartu statistik kita
        return [
            Stat::make('Total Anggota', User::count())
                ->description('Jumlah total anggota terdaftar')
                ->icon('heroicon-o-users')
                ->color('success'),
            Stat::make('Total Judul Buku', Buku::count())
                ->description('Jumlah jenis buku di perpustakaan')
                ->icon('heroicon-o-book-open'),
            Stat::make('Total Stok Tersedia', Buku::sum('stok'))
                ->description('Jumlah semua eksemplar buku')
                ->icon('heroicon-o-archive-box'),
            Stat::make('Peminjaman Aktif', PeminjamanHeader::where('status_peminjaman', 'Dipinjam')->count())
                ->description('Jumlah buku yang sedang dipinjam')
                ->icon('heroicon-o-arrow-uturn-right')
                ->color('warning'),
        ];
    }
}
