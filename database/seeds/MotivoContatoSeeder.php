<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['tipo_contato'=>'Dúvida']);
        MotivoContato::create(['tipo_contato'=>'Elogio']);
        MotivoContato::create(['tipo_contato'=>'Reclamação']);
    }
}
