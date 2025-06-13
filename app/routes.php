<?php

namespace App\Controllers;
use App\Controllers\ListaDeUsuariosController;
use App\Controllers\ExampleController;
use App\Controllers\loginController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('listaDeUsuarios', 'ListaDeUsuariosController@index');
$router->post('listaDeUsuarios/create', 'ListaDeUsuariosController@store');
$router->post('listaDeUsuarios/edit', 'ListaDeUsuariosController@edit');
$router->post('listaDeUsuarios/delete', 'ListaDeUsuariosController@delete');
$router->get('login', 'loginController@exibirLogin');
$router->get('dashboard', 'loginController@exibirDashboard');
$router->post('login', 'loginController@efetuaLogin');
$router->post('logout', 'loginController@logout');
