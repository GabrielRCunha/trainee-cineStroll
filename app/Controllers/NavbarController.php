<?php

namespace App\Controllers;
use App\Core\App;

use PDO;

class NavbarController
{
    public function index()
    {
        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 0) {
                return redirect('site/listaDePosts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if ($inicio > $rows_count) {
            return redirect('site/listaDePosts');
        }

        if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {

            $itensPage = 5;
            $inicio = $itensPage * $page - $itensPage;
            $rows_count = App::get('database')->countAllPesquisa('posts', $_GET['pesquisa']);

            if ($inicio > $rows_count) {
                return redirect('site/listaDePosts');
            }

            $posts = App::get('database')->selectPostsComAutoresPesquisa($inicio, $itensPage, $_GET['pesquisa']);
        } else {
            $posts = App::get('database')->selectPostsComAutores($inicio, $itensPage);
        }

        $total_pages = ceil($rows_count / $itensPage);

        return view('site/listaDePosts', compact('posts', 'page', 'total_pages'));
    }
}