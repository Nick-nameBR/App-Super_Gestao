<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedores.index');
    }

    public function listar(Request $request){

        
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
    
                                                //envia os dados recebidos para a view
        return view('app.fornecedores.listar', ['fornecedores'=>$fornecedores]);
    }
    
    public function adicionar(Request $request){

        // inclusão dos dados
        if($request->input('_token') != '' && $request->input('id') == '') {
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

            $msg = 'Cadastro realizado com sucesso!';
        }

        //edição dos dados
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $editar = $fornecedor->update($request->all());

            if($editar) {
                $msg = "Cadastro atualizado com sucesso!";
            } else {
                $msg = "Erro na atualização!";
            }

            return redirect()->route('app.fornecedores.editar', ['id'=> $request->input('id'), 'msg'=> $msg]);
        }
        
        return view('app.fornecedores.adicionar', ['msg'=> $msg]);
    }

    public function editar($id, $msg = ''){
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedores.adicionar', ['fornecedor'=>$fornecedor, 'msg'=> $msg]);
    }
}
