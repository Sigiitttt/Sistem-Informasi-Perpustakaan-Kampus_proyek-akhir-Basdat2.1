<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password; // <-- PENTING: Tambahkan use statement ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Atur aturan default untuk password di sini
        Password::defaults(function () {
            // Kita hanya atur panjang minimalnya saja menjadi 3
            return Password::min(3);
        });
    }
}