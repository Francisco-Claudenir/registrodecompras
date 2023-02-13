<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->usuario = 'admin';
        $user->password =Hash::make('ctic@uema');
    }
}
