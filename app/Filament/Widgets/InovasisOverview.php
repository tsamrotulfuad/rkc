<?php

namespace App\Filament\Widgets;

use App\Models\InovasiMasyarakat;
use App\Models\InovasiPerangkatDaerah;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class InovasisOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Inovasi Masyarakat', InovasiMasyarakat::query()->count()),
            Stat::make('Inovasi Perangkat Daerah', InovasiPerangkatDaerah::query()->count()),
        ];
    }
}
