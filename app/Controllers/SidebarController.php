<?php

namespace App\Controllers;

use App\Core\App;

class SidebarController {
    public function index()
    {
        $idUsuarioLogado = $this->verificaAutenticacao();
        
        $usuarios = App::get('database')->selectAll('usuarios');

        $UsuarioLogado = App::get('database')->selectOne('$idUsuarioLogado');
        
        return view('admin/listaDeUsuarios', compact('usuarios','idUsuarioLogado'));
    }

    private function verificaAutenticacao()
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }
        return $_SESSION['id'];
    }
}
