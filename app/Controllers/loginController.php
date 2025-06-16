<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class loginController
{
    public function exibirLogin()
    {
        return view('site/login');
    }

    public function exibirDashboard()
    {
        return view('admin/dashboard');
    }

    public function efetuaLogin(): void 
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarios = App::get('database')->verificaLogin($email,$senha);

        if($usuarios != false){
            session_start();
            $_SESSION['id'] = $usuarios->id;
            header(header: 'Location: /dashboard');
            exit;
        }

        else{
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário e/ou senha incorretos";
            header(header:'Location:/login');

        }

    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header(header: 'Location: /login');

    }


}