<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            {{-- BLOK UNTUK MENAMPILKAN NOTIFIKASI --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
            @if(isset($notifikasiJatuhTempo) && $notifikasiJatuhTempo->isNotEmpty())
                {{-- Container notifikasi yang bisa ditutup --}}
                <div x-data="{ show: true }" x-show="show" class="bg-yellow-100 dark:bg-yellow-800/50 border-l-4 border-yellow-500 text-yellow-800 dark:text-yellow-200 p-4 rounded-lg relative" role="alert">
                    <div class="flex">
                        <div class="py-1">
                            {{-- Icon --}}
                            <svg class="fill-current h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zM9 5v6h2V5H9zm0 8h2v2H9v-2z"/></svg>
                        </div>
                        <div>
                            <p class="font-bold">Pengingat Jatuh Tempo</p>
                            <ul class="list-disc ml-5 mt-2">
                                @foreach($notifikasiJatuhTempo as $notif)
                                    @foreach($notif->details as $detail)
                                    <li>
                                        Buku "<strong>{{ $detail->buku->judul }}</strong>" akan jatuh tempo pada 
                                        <strong>{{ \Carbon\Carbon::parse($notif->tgl_wajib_kembali)->diffForHumans() }}</strong> 
                                        (tanggal {{ \Carbon\Carbon::parse($notif->tgl_wajib_kembali)->isoFormat('D MMMM Y') }}).
                                    </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                     {{-- Tombol close --}}
                    <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-yellow-600 dark:text-yellow-300" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </button>
                </div>
            @endif
        </div>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
