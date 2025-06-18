<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;
// Pastikan path ke widget Anda benar
// Jika file StatsOverview ada di app/Filament/Widgets:
use App\Filament\Widgets\StatsOverview; 
// Jika file StatsOverview ada di app/Filament/Admin/Widgets:
// use App\Filament\Admin\Widgets\StatsOverview; 

class Dashboard extends BasePage
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}