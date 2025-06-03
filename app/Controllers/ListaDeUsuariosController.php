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
        $temporario = $_FILES['imagem']['tmp_name'];

        $nomeImagem = sha1(uniqid($_FILES['imagem']['name'], true)) . "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        $caminhoDaImagem = "../../public/assets/imagensUsuario/" . $nomeImagem;

        move_uploaded_file($temporario, $caminhoDaImagem);

        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'imagem' => $caminhoDaImagem,
        ];

        App::get('database') -> insert('usuarios', $parameters);

        header('Location: /listaDeUsuarios');
    }

    public function edit()
    {
         $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        $id = $_POST['id'];

        App::get('database') -> update('usuarios', $id, $parameters);

        header('Location: /listaDeUsuarios');

    }

    public function delete()
    {
         $id = $_POST['id'];

         App::get('database') -> delete ('usuarios', $id);

         header('Location: /listaDeUsuarios');

    }

}