<?php

namespace App\Filament\PerangkatDaerah\Pages\Auth;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerahRegister extends Register
{
    protected function handleRegistration(array $data): Model
    {
         $user = $this->getUserModel()::create($data);
         $user->assignRole('Perangkat Daerah');
 
         return $user;
    }
}
