<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

use PDO;

class PostIndividualController {
    public function index($id) 
    {

        $posts = App::get('database')->selectOne('posts', $id);

        return view('site/postIndividual', compact('posts'));
    }
}