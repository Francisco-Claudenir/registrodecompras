<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@email.com';
        $user->password = Hash::make('ctic@uema');
    }
}
