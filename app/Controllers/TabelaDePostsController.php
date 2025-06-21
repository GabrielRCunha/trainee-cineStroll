<?php

namespace App\Controllers;
use App\Core\App;

use PDO;


class TabelaDePostsController
{
    public function index()
    {
        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 0) {
                return redirect('admin/tabelaDePosts');
            }

        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($inicio > $rows_count) {
            return redirect('admin/tabelaDePosts');
        }

        $posts = App::get('database')->selectPostsComAutores($inicio, $itensPage);

        $usuarios = App::get('database')->selectAll('usuarios');


        $total_pages = ceil($rows_count / $itensPage);

        return view('admin/tabelaDePosts', compact('posts', 'usuarios', 'page', 'total_pages'));
    }
    public function store()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $loggedInUserId = $_SESSION['id'] ?? null;

        if (!$loggedInUserId) {
            header('Location: /login');
            exit();
        }

        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'author' => $loggedInUserId,
            'diretor' => $_POST['diretor'],
            'ano' => $_POST['ano']
        ];

        App::get('database')->insert('posts', $parameters, $_FILES['imagem']);

        header('Location: /tabelaDePosts');
        exit();
    }

    public function edit()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $loggedInUserId = $_SESSION['id'] ?? null;
        if (!$loggedInUserId) {
            header('Location: /login');
            exit();
        }

        $postId = $_POST['id'];

        $post = App::get('database')->selectOne('posts', $postId);

        if (!$post) {
            header('Location tabelaDePosts');
            exit();
        }

        if ($post['user_id'] != $loggedInUserId) {
            $_SESSION['mensagem-erro'] = "Você não tem permissão para editar este post.";
            header('Location: /tabelaDePosts');
            exit();
        }

        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'rating' => $_POST['rating'],
            'diretor' => $_POST['diretor'],
            'ano' => $_POST['ano'],
        ];

        $image = isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0 ? $_FILES['imagem'] : null;
        $fotoAtual = $_POST['fotoAtual'];

        App::get('database')->update('posts', $postId, $parameters, $image, $fotoAtual);

        header('Location: /tabelaDePosts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /tabelaDePosts');
    }

    public function nomeAutor()
    {

    }
}
