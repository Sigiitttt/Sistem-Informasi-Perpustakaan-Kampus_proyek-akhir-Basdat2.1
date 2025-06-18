<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- KARTU 1: BUKU TERPOPULER --}}
        {{-- Perubahan: Menambahkan class dark:bg-gray-800 dan dark:text-gray-100 --}}
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-gray-900 dark:text-gray-100">
            <h2 class="text-xl font-bold mb-4">Laporan 10 Buku Terpopuler</h2>
            <table class="w-full text-left">
                {{-- Perubahan: Menambahkan class dark:bg-gray-700 --}}
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="p-2">No.</th>
                        <th class="p-2">Judul Buku</th>
                        <th class="p-2 text-center">Jumlah Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bukuTerpopuler as $index => $buku)
                        {{-- Perubahan: Menambahkan class dark:border-gray-700 --}}
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-2">{{ $index + 1 }}</td>
                            <td class="p-2">{{ $buku->judul }}</td>
                            <td class="p-2 text-center font-bold">{{ $buku->jumlah_dipinjam }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-2 text-center text-gray-500">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- KARTU 2: ANGGOTA TERAKTIF --}}
        {{-- Perubahan: Menambahkan class dark:bg-gray-800 dan dark:text-gray-100 --}}
        <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-gray-900 dark:text-gray-100">
            <h2 class="text-xl font-bold mb-4">Laporan 10 Anggota Teraktif</h2>
            <table class="w-full text-left">
                {{-- Perubahan: Menambahkan class dark:bg-gray-700 --}}
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="p-2">No.</th>
                        <th class="p-2">Nama Anggota</th>
                        <th class="p-2 text-center">Jumlah Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggotaTeraktif as $index => $anggota)
                        {{-- Perubahan: Menambahkan class dark:border-gray-700 --}}
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-2">{{ $index + 1 }}</td>
                            <td class="p-2">{{ $anggota->nama_anggota }}</td>
                            <td class="p-2 text-center font-bold">{{ $anggota->jumlah_pinjam }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-2 text-center text-gray-500">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- KARTU 3: TRANSAKSI TERAKHIR (FULL WIDTH) --}}
        {{-- Perubahan: Menambahkan class dark:bg-gray-800 dan dark:text-gray-100 --}}
        <div class="lg:col-span-2 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-gray-900 dark:text-gray-100">
            <h2 class="text-xl font-bold mb-4">10 Transaksi Terakhir</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    {{-- Perubahan: Menambahkan class dark:bg-gray-700 --}}
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="p-2">Judul Buku</th>
                            <th class="p-2">Peminjam</th>
                            <th class="p-2">Tanggal Pinjam</th>
                            <th class="p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamanTerbaru as $transaksi)
                             {{-- Perubahan: Menambahkan class dark:border-gray-700 --}}
                            <tr class="border-b dark:border-gray-700">
                                <td class="p-2">{{ $transaksi->judul_buku }}</td>
                                <td class="p-2">{{ $transaksi->nama_peminjam }}</td>
                                <td class="p-2">{{ \Carbon\Carbon::parse($transaksi->tgl_pinjam)->isoFormat('D MMMM YYYY') }}</td>
                                <td class="p-2">
                                    {{-- Class badge biasanya sudah cukup kontras, tapi bisa disesuaikan jika perlu --}}
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaksi->status_peminjaman == 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $transaksi->status_peminjaman }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-2 text-center text-gray-500">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-filament-panels::page>