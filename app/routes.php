<?php

namespace App\Controllers;
use App\Controllers\ListaDeUsuariosController;
use App\Controllers\ExampleController;
use App\Controllers\loginController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('tabelaDePosts', 'TabelaDePostsController@index');

$router->post('admin/criarPost', 'TabelaDePostsController@store');
$router->post('admin/editarPost', 'TabelaDePostsController@edit');
$router->post('admin/deletePost', 'TabelaDePostsController@delete');

$router->get('listaDeUsuarios', 'ListaDeUsuariosController@index');
$router->post('listaDeUsuarios/create', 'ListaDeUsuariosController@store');
$router->post('listaDeUsuarios/edit', 'ListaDeUsuariosController@edit');
$router->post('listaDeUsuarios/delete', 'ListaDeUsuariosController@delete');

$router->get('login', 'loginController@exibirLogin');

$router->get('dashboard', 'loginController@exibirDashboard');

$router->post('login', 'loginController@efetuaLogin');
$router->post('logout', 'loginController@logout');

$router->get('listaDePosts', 'ListaDePostsController@index');

$router->get('sidebar', 'SidebarController@index');

$router->get('postIndividual/{id}', 'PostIndividualController@index');

$router->get('landingPage', 'LandingPageController@index');

$router->get('navbar', 'NavbarController@index');
$router->get('listaDePosts', 'NavbarController@index');
