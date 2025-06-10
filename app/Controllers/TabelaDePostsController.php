<?php

namespace App\Controllers;
use App\Core\App;

use Exception;

class TabelaDePostsController {
    public function index() {
        $posts = App::get('database')->selectAll('posts');
        return view('admin/tabelaDePosts', compact('posts'));
    }

}

