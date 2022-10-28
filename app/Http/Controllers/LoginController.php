<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválidos!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro'=>$erro]);
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
        $email = $request->get('usuario');
        $passowrd = $request->get('senha');

        //Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password',$passowrd)->get()->first();
        if(isset($usuario->name)) {
            echo 'Usuario existe';
        } else {
            return redirect()->route('site.login', ['erro'=> 1]);
        }

    }
}
