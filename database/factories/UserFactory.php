<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => str_pad($this->faker->randomNumber(8), 11, '0', STR_PAD_LEFT),
            'telefone' => str_pad($this->faker->randomNumber(8), 11, '989', STR_PAD_LEFT),
            'endereco' => '{"cep": "65000000","numero": "00","endereco": "Rua Admin", "bairro": "Bairro Admin"}',
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {

    //         $inscricao = PrimeirosPassosInscricao::factory()->count(1)->create([
    //             'primeiropasso_id' => $primeiropasso->primeiropasso_id,
    //             'user_id' => $user->id,
    //             'areaconhecimento_id' => 2,
    //             'identidade' => '12345678985',
    //             'matricula' => '12345678985',
    //             'centro' => '12345678985',
    //             'copiacontrato' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
    //             'tituloprojetopesquisa' => 'projeto',
    //             'resumoprojeto' => 'teste teste teste teste',
    //             'projetopesquisa' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
    //             'chefeimediato' => 'Teste Teste',
    //             'parecercomite' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',
    //             'curriculolattes' => 'PrimeirosPassos/2023/1/copiacontrato/12345678945/copiacontrato_104418202306026479f23212b01.pdf',

    //         ]);

    //         $user->user_pp_inscricao()->saveMany($inscricao);
    //     });
    // }
}
