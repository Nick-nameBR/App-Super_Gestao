<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = [
            '1'=>'Dúvida',
            '2'=>'Elogio',
            '3'=>'Reclamação'
        ];
        
        
        return view('site.contato', ['titulo' => 'Contato','motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){

        $request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'required',
            'motivo_contato'=>'required',
            'mensagem'=>'required|max:200',
        ]);

        /*Capturando informações do formulário atraves do método request

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        Enviando as informações para o banco de dados

        $contato->save();*/

        //Tornando o código acima mais simples utilizando o método fill (pois no model possuimos o método fillable)
        $contato = new SiteContato();
        
        //Validação para evitar a chamada do request sempre que acessar a página
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $contato->fill($request->all());
            $contato->save();
        }
    }
}
