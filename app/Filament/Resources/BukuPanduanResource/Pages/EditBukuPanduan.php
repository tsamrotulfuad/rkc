<?php

namespace App\Filament\Resources\BukuPanduanResource\Pages;

use App\Filament\Resources\BukuPanduanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBukuPanduan extends EditRecord
{
    protected static string $resource = BukuPanduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
