<?php

namespace App\Controllers;
use App\Core\App;

use PDO;


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
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'author' => $_POST['author'],
            'created_at' => $_POST['created_at'],
        ];

        App::get('database')->insert('posts', $parameters);

        header('Location: /tabelaDePosts');
    }

        public function edit()
    {

        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'author' => $_POST['author'],
            'created_at' => $_POST['created_at'],
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
