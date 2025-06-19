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
        $rows_count = App::get('database')->countAll('posts'); // Continua contando apenas os posts

        if($inicio > $rows_count){
            return redirect('admin/tabelaDePosts');
        }

        // --- Use sua nova função aqui! ---
        // Agora, $posts conterá os dados do post E o nome do autor em $post->nome_autor
        $posts = App::get('database')->selectPostsComAutores($inicio, $itensPage);

        // A variável $usuarios não é mais estritamente necessária para mostrar o nome do autor
        // na tabela de posts, pois já vem com cada post.
        // Se você a usa em outro lugar na view (por exemplo, um dropdown de seleção de autor),
        // mantenha a linha abaixo; caso contrário, pode removê-la para limpar o código.
        $usuarios = App::get('database')->selectAll('usuarios'); // Mantido para compatibilidade com o compact() e outros usos na view, se houver.


        $total_pages = ceil($rows_count/$itensPage);

        // Manda os dados para a view
        // $usuarios é incluído para evitar o aviso do compact(), mesmo que não seja usado para o nome do autor.
        return view('admin/tabelaDePosts', compact('posts', 'usuarios', 'page', 'total_pages'));
    }
    public function store()
    {
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'author' => $_POST['author'],
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
