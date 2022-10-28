<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        
        //Validação
        $regra = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Mensagem de feedback
        $feedback = [
            'usuario.email' => 'Obrigatório o preenchimento de um email válido!',
            'senha.required' => 'A senha deve ser preenchida!'
        ];

        $request->validate($regra, $feedback);

        print_r($request->all());
    }
}
