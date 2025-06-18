<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Peminjaman Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Container utama dengan warna yang mendukung dark mode --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">Daftar Semua Transaksi Anda</h3>
                    
                    {{-- Wrapper untuk membuat tabel bisa di-scroll horizontal di layar kecil --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            {{-- Header Tabel dengan styling baru --}}
                            <thead class="border-b-2 border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Judul Buku</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Tgl Pinjam</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Jatuh Tempo</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Tgl Kembali</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($riwayat_peminjaman as $item)
                                    {{-- Baris tabel dengan border bawah yang adaptif --}}
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $item->judul_buku }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($item->tgl_pinjam)->isoFormat('D MMM YYYY') }}</td>
                                        
                                        {{-- JATUH TEMPO: Diberi warna merah HANYA JIKA masih dipinjam & sudah lewat waktu --}}
                                        <td class="px-6 py-4 whitespace-nowrap font-medium {{ ($item->status_peminjaman == 'Dipinjam' && \Carbon\Carbon::parse($item->tgl_wajib_kembali)->isPast()) ? 'text-red-500 dark:text-red-400' : '' }}">
                                            {{ \Carbon\Carbon::parse($item->tgl_wajib_kembali)->isoFormat('D MMM YYYY') }}
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">{{ $item->tgl_pengembalian ? \Carbon\Carbon::parse($item->tgl_pengembalian)->isoFormat('D MMM YYYY') : '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- Badge status dengan styling baru untuk dark mode --}}
                                            <span @class([
                                                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300' => $item->status_peminjaman == 'Dipinjam',
                                                'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' => $item->status_peminjaman == 'Selesai',
                                            ])>
                                                {{ $item->status_peminjaman }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold">Rp {{ number_format($item->total_denda, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                            Anda belum memiliki riwayat peminjaman apapun.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>