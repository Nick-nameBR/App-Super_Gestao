<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor teste';
        $fornecedor->site = 'stie.com.br';
        $fornecedor->uf = 'MG';
        $fornecedor->email = 'teste@teste.com.br';
        $fornecedor->save();

        //método create (utilizando o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor2',
            'site' => 'Fornecedor2.com.br',
            'uf' => 'SP',
            'email' => 'contato@teste.com.br'
        ]);
        

        //método insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor3',
            'site' => 'Fornecedor3.com.br',
            'uf' => 'RJ',
            'email' => 'contato.contato@teste.com.br'
        ]);
        
    }
}
