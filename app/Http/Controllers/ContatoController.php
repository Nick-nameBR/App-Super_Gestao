<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato() {

        $motivo_contatos = MotivoContato::all();
        
        
        return view('site.contato', ['titulo' => 'Contato','motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){

        $request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
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
            return redirect()->route('site.index');
            
        }
    }
}
