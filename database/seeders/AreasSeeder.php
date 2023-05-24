<?php

namespace Database\Seeders;

use App\Models\GrandeArea;
use App\Models\SubArea;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criação da Grande Area
        $cienciaAgrarias = GrandeArea::create(['nome' => 'Ciencias Agrarias']);

        $cienciaBiologicas = GrandeArea::create(['nome' => 'Ciencias Biologicas']);

        $cienciaSaude = GrandeArea::create(['nome' => 'Ciencias da Saude']);

        $cienciaExatas = GrandeArea::create(['nome' => 'Ciencias Exatas e da Terra']);

        $cienciaHumanas = GrandeArea::create(['nome' => 'Ciencias Humanas']);

        $cienciaSocias = GrandeArea::create(['nome' => 'Ciencias Socias Aplicadas']);

        $engenharias = GrandeArea::create(['nome' => 'Ciencias Engenharias']);

        $linguisticasLetrasArtes = GrandeArea::create(['nome' => 'Linguistica, Letras e Artes']);


        //SubArea
        SubArea::create([
            'area_id' => $cienciaAgrarias->area_id,
            'nome' => 'Agronomia'
        ]);
        SubArea::create([
            'area_id' => $cienciaAgrarias->area_id,
            'nome' => 'Engenharia de Pesca'
        ]);
        SubArea::create([
            'area_id' => $cienciaAgrarias->area_id,
            'nome' => 'Medicina Veterinaria'
        ]);
        SubArea::create([
            'area_id' => $cienciaAgrarias->area_id,
            'nome' => 'Zootecnia'
        ]);
        /////////////////////////////////////////////
        SubArea::create([
            'area_id' => $cienciaBiologicas->area_id,
            'nome' => 'Biologia'
        ]);
        /////////////////////////////////////////////
        SubArea::create([
            'area_id' => $cienciaSaude->area_id,
            'nome' => 'Enfermagem'
        ]);
        SubArea::create([
            'area_id' => $cienciaSaude->area_id,
            'nome' => 'Medicina'
        ]);
        SubArea::create([
            'area_id' => $cienciaSaude->area_id,
            'nome' => 'Educaçaõ Fisica'
        ]);
        ////////////////////////////////////////////
        SubArea::create([
            'area_id' => $cienciaExatas->area_id,
            'nome' => 'Fisica'
        ]);
        SubArea::create([
            'area_id' => $cienciaExatas->area_id,
            'nome' => 'Matematica'
        ]);
        SubArea::create([
            'area_id' => $cienciaExatas->area_id,
            'nome' => 'Quimica'
        ]);
        ///////////////////////////////////////////
        SubArea::create([
            'area_id' => $cienciaHumanas->area_id,
            'nome' => 'Educacao'
        ]);
        SubArea::create([
            'area_id' => $cienciaHumanas->area_id,
            'nome' => 'Filosofia'
        ]);
        SubArea::create([
            'area_id' => $cienciaHumanas->area_id,
            'nome' => 'Geografia'
        ]);
        SubArea::create([
            'area_id' => $cienciaHumanas->area_id,
            'nome' => 'Historia'
        ]);
        ///////////////////////////////////////////
        SubArea::create([
            'area_id' => $cienciaSocias->area_id,
            'nome' => 'Administracao'
        ]);
        SubArea::create([
            'area_id' => $cienciaSocias->area_id,
            'nome' => 'Arquitetura e Urbanismo'
        ]);
        SubArea::create([
            'area_id' => $cienciaSocias->area_id,
            'nome' => 'Ciencias Sociais'
        ]);
        SubArea::create([
            'area_id' => $cienciaSocias->area_id,
            'nome' => 'Direito'
        ]);
        //////////////////////////////////////////
        SubArea::create([
            'area_id' => $engenharias->area_id,
            'nome' => 'Engenharia Civil'
        ]);
        SubArea::create([
            'area_id' => $engenharias->area_id,
            'nome' => 'Engenharia da Computacao'
        ]);
        SubArea::create([
            'area_id' => $engenharias->area_id,
            'nome' => 'Engenharia Mecanica'
        ]);
        SubArea::create([
            'area_id' => $engenharias->area_id,
            'nome' => 'Engenharia de Producao'
        ]);
        //////////////////////////////////////////
        SubArea::create([
            'area_id' => $linguisticasLetrasArtes->area_id,
            'nome' => 'Linguistica'
        ]);
        SubArea::create([
            'area_id' => $linguisticasLetrasArtes->area_id,
            'nome' => 'Letras'
        ]);
        SubArea::create([
            'area_id' => $linguisticasLetrasArtes->area_id,
            'nome' => 'Artes'
        ]);
    }
}
