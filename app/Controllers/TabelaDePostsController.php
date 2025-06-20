<?php

namespace App\Controllers;
use App\Core\App;

use PDO;


class TabelaDePostsController {
   public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
                return redirect('admin/tabelaDePosts');
            }

        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts'); 

        if($inicio > $rows_count){
            return redirect('admin/tabelaDePosts');
        }

        $posts = App::get('database')->selectPostsComAutores($inicio, $itensPage);

        $usuarios = App::get('database')->selectAll('usuarios'); 


        $total_pages = ceil($rows_count/$itensPage);

        return view('admin/tabelaDePosts', compact('posts', 'usuarios', 'page', 'total_pages'));
    }
    public function store()
    {
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'author' => $_POST['author'],
            'diretor' => $_POST['diretor'],
            'ano' => $_POST['ano']
        ];

        App::get('database')->insert('posts', $parameters, $_FILES['imagem']);

        header('Location: /tabelaDePosts');
    }

    public function edit()
    {
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'author' => $_POST['author'],
            'diretor' => $_POST['diretor'],
            'ano' => $_POST['ano']
        ];

        $id = $_POST['id'];
        $image = isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0 ? $_FILES['imagem'] : null;
        $fotoAtual = $_POST['fotoAtual'];

        App::get('database')->update('posts', $id, $parameters, $image, $fotoAtual);

        header('Location: /tabelaDePosts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /tabelaDePosts');
    }

    // public function nomeAutor()
    // {
    //     $autor_id = $posts->author;
    //     $usuario = App::get('database')->selectOne('usuarios', $autor_id);
    // }
}
