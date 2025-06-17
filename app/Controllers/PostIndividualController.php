<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

use PDO;

class PostIndividualController {
    public function index($id) 
    {

        $posts = App::get('database')->selectOne('posts', $id);

        $autor_id = $posts->author;
        $usuario = App::get('database')->selectOne('usuarios', $autor_id);


        return view('site/postIndividual', compact('posts', 'usuario'));
    }
}