<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaLogin($email, $senha)
    {
        $sql = sprintf(format: 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha');

         try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email'=> $email,
                'senha' => $senha
            ]);

            $usuarios = $stmt->fetch(PDO::FETCH_OBJ);
            return $usuarios;

        } catch (Exception $e) {
            die($e->getMessage());
        }


    }

}