<?php

namespace Database\Factories;

use App\Models\PlanoTrabalho;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanoTrabalhoFactory extends Factory
{

    protected $model = PlanoTrabalho::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'modalidade_id' => 1,
            'titulo' =>  'Titutlo '. $this->faker->name,
            'resumo' => 'resumo do plano',
            'arquivo' => 'PrimeirosPassos/2023/1/planotrabalho/12345678945/planotrabalho_104418202306026479f23212b01.pdf'
        ];
    }
}
