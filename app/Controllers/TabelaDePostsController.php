<?php

namespace App\Controllers;

use PDO;

class TabelaDePostsController {
   public function index()
    {
        //Seleciona todos os usuarios da database
        $usuarios = App::get('database')->selectAll('posts');

        //Manda eles para a pagina do Crud Usuarios no Compact
        return view('admin/tabelaDePosts', compact('posts'));
    }
    public function store() {
        // Conexão com o banco
        $pdo = new PDO('mysql:host=localhost;dbname=cine_stroll_db', 'root', '');

        // Pegando dados do formulário
        $titulo = $_POST['titulo'] ?? '';
        $conteudo = $_POST['conteudo'] ?? '';
        $nota = $_POST['nota'] ?? '';
        $autor = $_POST['autor'] ?? '';
        $data = $_POST['data'] ?? '';

        // Processamento da imagem
        $nomeImagem = null;
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            $nomeImagem = uniqid() . '-' . basename($imagem['name']);
            $caminho = __DIR__ . '/../../public/uploads/' . $nomeImagem;

            if (!move_uploaded_file($imagem['tmp_name'], $caminho)) {
                die('Erro ao mover a imagem');
            }
        }

        // Inserção no banco
        $sql = "INSERT INTO posts (title, content, rating, author, created_at, image) 
                VALUES (:titulo, :conteudo, :nota, :autor, :data, :image)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':nota' => $nota,
            ':autor' => $autor,
            ':data' => $data,
            ':image' => $nomeImagem
        ]);

        // Redirecionar ou exibir mensagem
        header('Location: /tabelaDePosts');
        exit;
        }

        public function edit()
    {

        $parameters = [
           ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':nota' => $nota,
            ':autor' => $autor,
            ':data' => $data,
        ];

        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);

        header('Location: /tabelaDePosts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /tabelaDePosts');
    }
}
