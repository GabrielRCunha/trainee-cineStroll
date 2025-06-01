<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controller
{
    public function exibirLogin()
    {
        return view('admin/login');
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
        }

    }


}