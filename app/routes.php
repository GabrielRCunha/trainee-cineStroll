<?php

namespace App\Controllers;
use App\Controllers\ListaDeUsuariosController;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('listaDeUsuarios', 'ListaDeUsuariosController@index');
$router->post('listaDeUsuarios/create', 'ListaDeUsuariosController@store');