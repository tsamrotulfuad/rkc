<?php

namespace App\Filament\PerangkatDaerah\Resources\InovasiResource\Pages;

use App\Filament\PerangkatDaerah\Resources\InovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInovasi extends EditRecord
{
    protected static string $resource = InovasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
