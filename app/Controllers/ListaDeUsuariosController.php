<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaDeUsuariosController
{

    public function index()
    {
        return view('admin/listaDeUsuarios');
    }
}