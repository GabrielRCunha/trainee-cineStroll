<?php

namespace App\Controllers;
use App\Controllers\ListaDeUsuariosController;
use App\Controllers\ExampleController;
use App\Controllers\loginController;
use App\Core\Router;

$router->get('', 'LandingPageController@index');
$router->get('navbar', 'NavbarController@index');
$router->get('postIndividual/{id}', 'PostIndividualController@index');
$router->get('listaDePosts', 'ListaDePostsController@index');

$router->get('login', 'loginController@exibirLogin');
$router->post('login', 'loginController@efetuaLogin');
$router->post('logout', 'loginController@logout');
$router->get('logout', 'loginController@logout');

$router->get('dashboard', 'loginController@exibirDashboard');

$router->get('listaDeUsuarios', 'ListaDeUsuariosController@index');
$router->post('listaDeUsuarios/create', 'ListaDeUsuariosController@store');
$router->post('listaDeUsuarios/edit', 'ListaDeUsuariosController@edit');
$router->post('listaDeUsuarios/delete', 'ListaDeUsuariosController@delete');

$router->get('tabelaDePosts', 'TabelaDePostsController@index');
$router->post('admin/criarPost', 'TabelaDePostsController@store');
$router->post('admin/editarPost', 'TabelaDePostsController@edit');
$router->post('admin/deletePost', 'TabelaDePostsController@delete');

$router->get('sidebar', 'SidebarController@index');