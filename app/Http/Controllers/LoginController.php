<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //FUNÇÃO PRINCIPAL
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválidos!';
        }elseif($request->get('erro') == 2){
            $erro = 'Não foi efeutado o login!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro'=>$erro]);
    }


    //FUNÇÃO DE AUTENTICAÇÃO
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
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

           return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro'=> 1]);
        }
    }


    //FUNÇÃO DE LOGOUT
    public function sair(){
        echo 'Sair';
        //return view('app.sair');
    }
}
