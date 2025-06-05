<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;


$router->get('', 'ExampleController@index');

$router->get('tabelaDePosts', 'TabelaDePostsController@index');

$router->post('admin/criarPost', 'TabelaDePostsController@store');