<?php

namespace App\Controllers;
use App\Core\App;

use PDO;
use App\Core\App;

class TabelaDePostsController {
   public function index()
    {
        //Seleciona todos os usuarios da database
        $posts = App::get('database')->selectAll('posts');

        //Manda eles para a pagina do Crud Posts no Compact
        return view('admin/tabelaDePosts', compact('posts'));
    }
    public function store()
    {
        $parameters = [
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':nota' => $nota,
            ':autor' => $autor,
            ':data' => $data,
        ];

        App::get('database')->insert('posts', $parameters);

        header('Location: /crudPosts');
    }

        public function edit()
    {

        $parameters = [
           ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':nota' => $nota,
            ':autor' => $autor,
            ':data' => $data,
        ];

        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);

        header('Location: /tabelaDePosts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /tabelaDePosts');
    }
}
