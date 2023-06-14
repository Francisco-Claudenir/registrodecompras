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
            'numero_inscricao' => static function (array $attributes) {
                self::$counter++;
                return self::$counter;
            },
            'areaconhecimento_id' => random_int(1, 26),
            'identidade' => '12345678985',
            'matricula' => '12345678985',
            'centro_id' => random_int(1, 54),
            'copiacontrato' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'vigencia_inicio' => '2023-06-02 00:00:00.000',
            'vigencia_fim' => '2023-06-02 00:00:00.000',
            'tituloprojetopesquisa' => 'projeto',
            'resumoprojeto' => 'teste teste teste teste',
            'projetopesquisa' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'chefeimediato' => 'Teste Teste',
            'anuenciachefe' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'parecercomite' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
            'curriculolattes' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (PrimeirosPassosInscricao $ppinscricao) {

            $ppinscricao->planotrabalho()->attach(PlanoTrabalho::factory()->create());
        });
    }
}
