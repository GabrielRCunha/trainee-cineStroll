<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaDeUsuariosController
{
    private function verificaAutenticacao()
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }
        return $_SESSION['id'];
    }

    private function verificaPermissaoEdicao($idUsuarioParaEditar)
    {
        $idUsuarioLogado = $this->verificaAutenticacao();

        if ($idUsuarioLogado != $idUsuarioParaEditar) {
            session_start();
            $_SESSION['mensagem-erro'] = "Você só pode modificar suas próprias informações";
            header('Location: /listaDeUsuarios');
            exit;
        }

        return true;
    }

    public function index()
    {
        $idUsuarioLogado = $this->verificaAutenticacao();

        $page = 1;
        $rows_count = App::get('database')->countAll('usuarios');
        $itensPage = 5;
        $total_pages = ceil($rows_count / $itensPage);

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if ($page <= 0 || $page > $total_pages) {
                return redirect('admin/listaDeUsuarios');
            }
        }

        $inicio = $itensPage * $page - $itensPage;

        if ($inicio > $rows_count) {
            return redirect('admin/listaDeUsuarios');
        }

        $usuarios = App::get('database')->selectAll('usuarios', $inicio, $itensPage);

        return view('admin/listaDeUsuarios', compact('usuarios', 'page', 'total_pages', 'idUsuarioLogado'));
    }

    public function store()
    {
        $this->verificaAutenticacao();

        try {
            $parameters = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
            ];

            App::get('database')->insertUsers('usuarios', $parameters, $_FILES['imagem']);

            session_start();
            $_SESSION['mensagem-sucesso'] = "Usuário criado com sucesso!";
            header('Location: /listaDeUsuarios');

        } catch (Exception $e) {
            session_start();
            $_SESSION['mensagem-erro'] = "Erro ao criar usuário: " . $e->getMessage();
            header('Location: /listaDeUsuarios');
        }
    }

    public function edit()
    {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            session_start();
            $_SESSION['mensagem-erro'] = "ID do usuário não informado";
            header('Location: /listaDeUsuarios');
            exit;
        }

        $id = $_POST['id'];
        $this->verificaPermissaoEdicao($id);

        try {
            $parameters = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
            ];

            $image = isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0 ? $_FILES['imagem'] : null;
            $fotoAtual = $_POST['fotoAtual'];

            App::get('database')->updateUsers('usuarios', $id, $parameters, $image, $fotoAtual);

            session_start();
            $_SESSION['mensagem-sucesso'] = "Suas informações foram atualizadas com sucesso!";
            header('Location: /listaDeUsuarios');

        } catch (Exception $e) {
            session_start();
            $_SESSION['mensagem-erro'] = "Erro ao atualizar informações: " . $e->getMessage();
            header('Location: /listaDeUsuarios');
        }
    }

    public function delete()
    {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            session_start();
            $_SESSION['mensagem-erro'] = "ID do usuário não informado";
            header('Location: /listaDeUsuarios');
            exit;
        }

        $id = $_POST['id'];
        $this->verificaPermissaoEdicao($id);

        try {
            App::get('database')->delete('usuarios', $id);

            session_start();
            $_SESSION['mensagem-sucesso'] = "Sua conta foi excluída com sucesso!";

            session_unset();
            session_destroy();
            header('Location: /login');

        } catch (Exception $e) {
            session_start();
            $_SESSION['mensagem-erro'] = "Erro ao excluir conta: " . $e->getMessage();
            header('Location: /listaDeUsuarios');
        }
    }
}