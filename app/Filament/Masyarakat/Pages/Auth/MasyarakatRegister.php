<?php

namespace App\Filament\Masyarakat\Pages\Auth;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register;
use Illuminate\Database\Eloquent\Model;

class MasyarakatRegister extends Register
{
   protected function handleRegistration(array $data): Model
   {
        $user = $this->getUserModel()::create($data);
        $user->assignRole('Masyarakat');

        return $user;
   }
}
