<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Administrador',
            'cpf' => '12345678945',
            'telefone' => '98988888888',
            'endereco' => '{"cep": "65000000","numero": "00","endereco": "Rua Admin", "bairro": "Bairro Admin"}',
            'email' => 'admin@ppg.com',
            'password' => Hash::make('password'),
        ]);
    }
}
