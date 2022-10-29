<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedores.index');
    }

    public function listar(){
        
        return view('app.fornecedores.listar');
    }
    
    public function adicionar(Request $request){
        if($request->input('_token') != '') {
            //validação
            $regras = [
                'nome'=>'required|min:3|max:50',
                'site'=>'required',
                'uf'=>'required|min:2|max:2',
                'email'=>'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'Mínimo de caracter deve ser 3',
                'nome.max' => 'Máximo de caracter deve ser 50',
                'uf.min' => 'Minimo de caracter deve ser 2',
                'uf.mmax' => 'Máximo de caracter deve ser 2',
                'email' => 'Informe um e-mail válido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }
        
        return view('app.fornecedores.adicionar');
    }
}
