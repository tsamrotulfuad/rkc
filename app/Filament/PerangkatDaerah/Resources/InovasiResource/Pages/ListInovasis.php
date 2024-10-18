<?php

namespace App\Filament\PerangkatDaerah\Resources\InovasiResource\Pages;

use App\Filament\PerangkatDaerah\Resources\InovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInovasis extends ListRecords
{
    protected static string $resource = InovasiResource::class;

    protected static ?string $breadcrumb = "List";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Inovasi'),
        ];
    }

    public function getTitle() : string
    {
        return "List Inovasi";
    }
}
