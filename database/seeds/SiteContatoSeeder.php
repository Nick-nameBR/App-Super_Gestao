<?php

namespace Database\Seeders;

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $contato = new SiteContato();
        $contato->nome = 'Nikolas';
        $contato->telefone = '(31) 99999-8888';
        $contato->email = 'nikolasmvsantos@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'teste mensagem contato';
        $contato->save();*/

        SiteContato::factory()->count(100)->create();
    }
}
