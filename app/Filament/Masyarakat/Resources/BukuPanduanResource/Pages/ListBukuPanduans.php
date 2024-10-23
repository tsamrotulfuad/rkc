<?php

namespace App\Filament\Masyarakat\Resources\BukuPanduanResource\Pages;

use App\Filament\Masyarakat\Resources\BukuPanduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBukuPanduans extends ListRecords
{
    protected static string $resource = BukuPanduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
