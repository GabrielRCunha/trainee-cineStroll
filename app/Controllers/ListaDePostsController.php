<?php

namespace App\Controllers;
use App\Core\App;

use PDO;

class ListaDePostsController {
    public function index() 
    {
        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0) {
                return redirect('site/listaDePosts');
            }
        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('site/listaDePosts');
        }

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        return view('site/listaDePosts', compact('posts', 'page', 'total_pages'));
    }
}