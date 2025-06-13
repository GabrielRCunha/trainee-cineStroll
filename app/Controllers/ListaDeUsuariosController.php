<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaDeUsuariosController
{

    public function index()
    {
        $page = 1;

        $rows_count = App::get('database')->countAll('usuarios');

        $itensPage = 5;

        $total_pages = ceil($rows_count/$itensPage);

        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero']))
        {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0 || $page > $total_pages)
            {
                return redirect('admin/listaDeUsuarios');
            }
        }    

        $inicio = $itensPage * $page - $itensPage;

        if($inicio > $rows_count)
        {
            return redirect('admin/listaDeUsuarios');
        }


        $usuarios = App::get('database')->selectAll('usuarios', $inicio, $itensPage);

        return view('admin/listaDeUsuarios', compact('usuarios', 'page', 'total_pages'));
    }

    public function store()
    {

        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        App::get('database') -> insert('usuarios', $parameters, $_FILES['imagem']);

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

        $image = isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0 ? $_FILES['imagem'] : null;
        $fotoAtual = $_POST['fotoAtual'];

        App::get('database')->update('usuarios', $id, $parameters, $image, $fotoAtual);

        header('Location: /listaDeUsuarios');

    }

    public function delete()
    {
         $id = $_POST['id'];

         App::get('database') -> delete ('usuarios', $id);

         header('Location: /listaDeUsuarios');

    }

}