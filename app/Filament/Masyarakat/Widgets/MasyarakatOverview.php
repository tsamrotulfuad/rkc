<?php

namespace App\Filament\Masyarakat\Widgets;

use App\Models\InovasiMasyarakat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MasyarakatOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Inovasi', InovasiMasyarakat::where('user_id', auth()->id())->count()),
        ];
    }
}
