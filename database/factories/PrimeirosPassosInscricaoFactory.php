<?php

namespace Database\Factories;

use App\Models\PlanoTrabalho;
use App\Models\PrimeiroPasso;
use App\Models\PrimeirosPassosInscricao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrimeirosPassosInscricaoFactory extends Factory
{
    protected $model = PrimeirosPassosInscricao::class;
    private static $counter = 0;
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
            'numero_inscricao' => static function(array $attributes){
                self::$counter++;
                return self::$counter;
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

    public function configure()
    {
        return $this->afterCreating(function (PrimeirosPassosInscricao $ppinscricao){

            $ppinscricao->planotrabalho()->attach(PlanoTrabalho::factory()->create());
        });
    }
}
