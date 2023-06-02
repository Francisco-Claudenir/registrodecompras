<?php

namespace Database\Factories;

use App\Models\PrimeirosPassosInscricao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrimeirosPassosInscricaoFactory extends Factory
{
    protected $model = PrimeirosPassosInscricao::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'primeiropasso_id' => 1,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'areaconhecimento_id' => 2,
            'identidade' => '12345678985',
            'matricula' => '12345678985',
            'centro' => '12345678985',
            'copiacontrato' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'tituloprojetopesquisa' => 'projeto',
            'resumoprojeto' => 'teste teste teste teste',
            'projetopesquisa' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'chefeimediato' => 'Teste Teste',
            'parecercomite' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'curriculolattes' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
        ];
    }
}
