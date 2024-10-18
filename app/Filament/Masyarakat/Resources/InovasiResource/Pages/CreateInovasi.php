<?php

namespace App\Filament\Masyarakat\Resources\InovasiResource\Pages;

use App\Filament\Masyarakat\Resources\InovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInovasi extends CreateRecord
{
    protected static string $resource = InovasiResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string
    {
        return 'Tambah Inovasi';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Inovasi';
    }

    public function getTitle(): string
    {
        return 'Inovasi';
    }
}
