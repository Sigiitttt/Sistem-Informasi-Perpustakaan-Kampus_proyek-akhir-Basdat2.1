<x-app-layout>
    <x-slot name="header">
        {{-- Header yang sudah mendukung dark mode --}}
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Buku
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Container utama yang adaptif --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    
                    {{-- Notifikasi dengan styling baru yang lebih baik & bisa ditutup --}}
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6">
                        @if (session('success'))
                            <div class="bg-green-100 dark:bg-green-900/50 border-l-4 border-green-500 text-green-800 dark:text-green-300 p-4 rounded-md relative" role="alert">
                                <p class="font-bold">Berhasil!</p>
                                <p>{{ session('success') }}</p>
                                <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-600 dark:text-green-200">&times;</button>
                            </div>
                        @endif

                        @if (session('error'))
                             <div class="bg-red-100 dark:bg-red-900/50 border-l-4 border-red-500 text-red-800 dark:text-red-300 p-4 rounded-md relative" role="alert">
                                <p class="font-bold">Gagal!</p>
                                <p>{{ session('error') }}</p>
                                <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-600 dark:text-red-200">&times;</button>
                            </div>
                        @endif
                    </div>

                    {{-- Grid layout utama untuk cover dan detail --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        
                        <div class="md:col-span-1">
                            {{-- Menggunakan aspect-ratio agar gambar konsisten --}}
                            <div class="aspect-[2/3] w-full rounded-lg overflow-hidden shadow-lg">
                                <img src="{{ $buku->gambar_cover ? asset('storage/' . $buku->gambar_cover) : 'https://via.placeholder.com/300x400.png/111827?text=No+Cover' }}" alt="Cover Buku {{ $buku->judul }}" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <div class="md:col-span-2 text-gray-800 dark:text-gray-200">
                            {{-- Judul dan Penulis --}}
                            <h1 class="text-3xl lg:text-4xl font-extrabold mb-1">{{ $buku->judul }}</h1>
                            <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">oleh {{ $buku->penulis }}</p>
                            
                            {{-- Detail Buku dalam bentuk list --}}
                            <div class="space-y-3 border-t border-gray-200 dark:border-gray-700 pt-6">
                                <h3 class="font-semibold text-lg mb-2">Detail Informasi</h3>
                                <dl class="grid grid-cols-3 gap-x-4 gap-y-2">
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Penerbit</dt>
                                    <dd class="col-span-2">{{ $buku->penerbit ?? '-' }}</dd>

                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Tahun Terbit</dt>
                                    <dd class="col-span-2">{{ $buku->tahun_terbit ?? '-' }}</dd>

                                    {{-- Menampilkan Kategori & Rak --}}
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Kategori</dt>
                                    <dd class="col-span-2">{{ $buku->kategori->nama ?? 'Tidak ada kategori' }}</dd>

                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Lokasi Rak</dt>
                                    <dd class="col-span-2">{{ $buku->rak->nama_rak ?? 'Tidak ada lokasi' }}</dd>

                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Stok</dt>
                                    <dd class="col-span-2 font-bold text-blue-600 dark:text-blue-400">{{ $buku->stok }}</dd>
                                </dl>
                            </div>

                            {{-- Deskripsi Buku --}}
                            <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                                <h3 class="font-semibold text-lg mb-2">Deskripsi</h3>
                                <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                                    {!! nl2br(e($buku->deskripsi ?? 'Tidak ada deskripsi.')) !!}
                                </div>
                            </div>

                            {{-- FORM UNTUK TOMBOL PINJAM --}}
                            <div class="mt-8 pt-6">
                                <form action="{{ route('pinjam.store', $buku) }}" method="POST">
                                    @csrf
                                    @if($buku->stok > 0)
                                        <button type="submit" class="w-full text-center bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition duration-300 ease-in-out">
                                            PINJAM BUKU INI
                                        </button>
                                    @else
                                        <button type="button" class="w-full text-center bg-gray-400 dark:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg cursor-not-allowed" disabled>
                                            STOK HABIS
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>