<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nome' => 'Administrador',
            'usuario' => 'admin@email.com',
            'password' => Hash::make('ctic@uema'),
            'cpf' => 'admin@email.com',
            'telefone' => 'admin@email.com',
            'email' => 'admin@email.com',
            'endereco' => '{ "enderecos": [{"rua": "Rua A","cidade": "São Paulo"}]}'
        ]);
    }
}
