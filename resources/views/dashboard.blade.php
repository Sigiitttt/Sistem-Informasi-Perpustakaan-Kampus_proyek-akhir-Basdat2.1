<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">Selamat Datang Kembali, {{ $user->name }}!</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Berikut adalah ringkasan aktivitas perpustakaan Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h4 class="text-gray-500 dark:text-gray-400 font-medium">Buku Sedang Dipinjam</h4>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ count($peminjamanAktif) }}</p>
                </div>
                <div class="p-6 rounded-lg shadow-sm {{ $peminjamanOverdueCount > 0 ? 'bg-red-100 dark:bg-red-800/50' : 'bg-white dark:bg-gray-800' }}">
                    <h4 class="{{ $peminjamanOverdueCount > 0 ? 'text-red-600 dark:text-red-300' : 'text-gray-500 dark:text-gray-400' }} font-medium">Lewat Batas Waktu</h4>
                    <p class="text-3xl font-bold mt-2 {{ $peminjamanOverdueCount > 0 ? 'text-red-700 dark:text-red-200' : 'text-gray-900 dark:text-gray-100' }}">{{ $peminjamanOverdueCount }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">Buku Anda Saat Ini</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="border-b-2 dark:border-gray-700">
                                <tr>
                                    <th class="py-2">Judul Buku</th>
                                    <th class="py-2">Tgl Pinjam</th>
                                    <th class="py-2">Jatuh Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peminjamanAktif as $peminjaman)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="py-3">{{ $peminjaman->details->first()->buku->judul ?? 'Buku tidak ditemukan' }}</td>
                                        <td class="py-3">{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->isoFormat('D MMM Y') }}</td>
                                        <td class="py-3 font-medium {{ \Carbon\Carbon::parse($peminjaman->tgl_wajib_kembali)->isPast() ? 'text-red-500' : '' }}">
                                            {{ \Carbon\Carbon::parse($peminjaman->tgl_wajib_kembali)->isoFormat('D MMMM Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-4 text-center text-gray-500">Anda sedang tidak meminjam buku apapun.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex flex-col md:flex-row gap-4">
                <a href="{{ route('katalog') }}" class="w-full md:w-auto text-center bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                    Jelajahi Katalog Buku
                </a>
                <a href="{{ route('riwayat') }}" class="w-full md:w-auto text-center bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-bold py-3 px-6 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300">
                    Lihat Semua Riwayat
                </a>
            </div>

        </div>
    </div>
</x-app-layout>