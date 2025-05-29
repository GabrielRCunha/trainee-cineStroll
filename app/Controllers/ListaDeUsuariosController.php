<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaDeUsuariosController
{

    public function index()
    {
        $usuarios = App::get('database')->selectAll('usuarios');

        return view('admin/listaDeUsuarios', compact('usuarios'));
    }

    public function store()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'imagem' => $_POST['imagem'],
        ];

        App::get('database') -> insert('usuarios', $parameters);

        header('Location: /listaDeUsuarios');
    }
}