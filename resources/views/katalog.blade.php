<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Katalog Buku') }}
        </h2>
    </x-slot>

    {{-- Kita tidak perlu mengubah background di sini, karena layout utama sudah menanganinya --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Container utama tidak perlu diberi warna gelap, biarkan transparan --}}
            <div class="overflow-hidden">
                <div class="p-6">
                    <div class="mb-8">
                        <form action="{{ route('katalog') }}" method="GET" class="w-full">
                            <label for="search" class="sr-only">Cari Buku</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search"
                                    class="block w-full pl-10 pr-3 py-3 border border-white-300 dark:border-gray-600 rounded-md leading-5 bg-white dark:bg-gray-800 text-white placeholder-white dark:placeholder-white focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Cari berdasarkan judul atau penulis..."
                                    value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @forelse ($daftar_buku as $buku)
                        {{-- Kartu buku yang bisa diklik --}}
                        <a href="{{ route('buku.show', $buku) }}" class="group block">
                            <div class="flex flex-col h-full bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl">

                                {{-- BAGIAN GAMBAR DENGAN ASPECT RATIO TETAP (2:3) --}}
                                <div class="aspect-[2/3] w-full overflow-hidden">
                                    <img src="{{ $buku->gambar_cover ? asset('storage/' . $buku->gambar_cover) : 'https://via.placeholder.com/300x400.png/111827?text=No+Cover' }}"
                                        alt="Cover Buku {{ $buku->judul }}"
                                        class="w-full h-full object-cover group-hover:opacity-90 transition-opacity duration-300">
                                </div>

                                {{-- BAGIAN DESKRIPSI TEKS --}}
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="font-bold text-md text-gray-900 dark:text-gray-100 truncate" title="{{ $buku->judul }}">
                                        {{ $buku->judul }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $buku->penulis }}</p>

                                    {{-- Bagian Stok diletakkan di bawah agar rata --}}
                                    <div class="mt-auto pt-2">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Stok:
                                            <span class="font-semibold text-blue-600 dark:text-blue-400">{{ $buku->stok }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <p class="col-span-full text-center text-gray-500 dark:text-gray-400 py-12">
                            Tidak ada buku yang tersedia saat ini.
                        </p>
                        @endforelse
                    </div>

                    {{-- BAGIAN PAGINASI --}}
                    <div class="mt-8 text-gray-900 dark:text-gray-100">
                        {{ $daftar_buku->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>