<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\loginController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('login', 'loginController@exibirLogin');
$router->get('dashboard', 'loginController@exibirDashboard');
$router->post('login', 'loginController@efetuaLogin');
$router->post('logout', 'loginController@logout');