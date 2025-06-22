<?php

namespace App\Controllers;
use App\Core\App;

use PDO;


class LandingPageController {
   public function index()
    {   
      $posts = App::get('database')->selecionaCinco('posts');
      return view('site/landingPage', compact('posts'));
    }
}