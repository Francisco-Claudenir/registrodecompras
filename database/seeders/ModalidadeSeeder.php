<?php

namespace Database\Seeders;

use App\Models\ModalidadeBolsa;
use Illuminate\Database\Seeder;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ModalidadeBolsa::create(['nome' => 'Padrão']);
        ModalidadeBolsa::create(['nome' => 'BATI 1']);
        ModalidadeBolsa::create(['nome' => 'BATI 2']);
    }
}
