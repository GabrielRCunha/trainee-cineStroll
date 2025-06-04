<?php

namespace App\Controllers;

use PDO;

class TabelaDePostsController {
    public function index() {
        // Conexão com o banco
        $pdo = new PDO('mysql:host=localhost;dbname=cine_stroll_db', 'root', '');

        // Busca os posts
        $stmt = $pdo->query("SELECT * FROM `posts`"); // ajuste o nome da tabela
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Chama a view, que usará $posts
        require __DIR__ . '/../views/admin/tabelaDePosts.view.php';
    }
}