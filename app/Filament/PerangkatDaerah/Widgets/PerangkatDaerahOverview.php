<?php

namespace App\Filament\PerangkatDaerah\Widgets;

use App\Models\InovasiPerangkatDaerah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class PerangkatDaerahOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Inovasi', InovasiPerangkatDaerah::where('user_id', auth()->id())->count()),
        ];
    }
}
