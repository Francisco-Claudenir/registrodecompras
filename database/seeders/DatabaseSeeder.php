<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\PP_IndicacaoBolsistasInscricao;
use App\Models\PrimeiroPasso;
use App\Models\PrimeirosPassosInscricao;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Perfil::create([
            'nome' => 'Coordenação de Pesquisa'
        ]);
        Perfil::create([
            'nome' => 'Coordenação de Pós Graduação'
        ]);
        Perfil::create([
            'nome' => 'Gabinete'
        ]);
        $admin = Perfil::create([
            'nome' => 'Administrador'
        ]);
        User::create([
            'nome' => 'Administrador',
            'cpf' => '12345678945',
            'perfil_id' => $admin->id,
            'telefone' => '98988888888',
            'endereco' => '{"cep": "65000000","numero": "00","endereco": "Rua Admin", "bairro": "Bairro Admin"}',
            'email' => 'admin@ppg.com',
            'password' => Hash::make('password'),
        ]);

        // $primeiropasso = PrimeiroPasso::create([
        //     'nome' => 'Primeiros Passos 2023',
        //     'descricao' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust',
        //     'data_inicio' => '2023-05-02 00:00:00.000',
        //     'data_fim' => '2023-05-25 23:59:59.000',
        //     'status' => 'Aberto'
        // ]);

        // $pp_indicacao = PP_IndicacaoBolsistas::create([
        //     'nome' => 'Primeiros Passos Indicacao 2023',
        //     'descricao' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust',
        //     'data_inicio' => '2023-06-15 00:00:00.000',
        //     'data_fim' => '2023-07-25 23:59:59.000',
        //     'status' => 'Aberto'
        // ]);

        $path = public_path('centros-cursos-postgres.sql');
        DB::unprepared(file_get_contents($path));

        $this->call([
            AreasSeeder::class,
            ModalidadeSeeder::class

        ]);

        // PrimeirosPassosInscricao::factory()->count(50)->create();
        // User::factory()->count(3)->create();

        //PP_IndicacaoBolsistasInscricao::factory()->count(50)->create();

        // $user = User::factory()->has(PrimeirosPassosInscricao::factory()->count(1)->state(function (array $attributes, User $user){
        //     return $user->id; 
        // }))->create();
    }
}
