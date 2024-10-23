<?php

namespace App\Filament\Resources\BukuPanduanResource\Pages;

use App\Filament\Resources\BukuPanduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBukuPanduans extends ListRecords
{
    protected static string $resource = BukuPanduanResource::class;

    protected static ?string $breadcrumb = "List";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Data'),
        ];
    }

    public function getTitle() : string
    {
        return "Buku Panduan";
    }
}
