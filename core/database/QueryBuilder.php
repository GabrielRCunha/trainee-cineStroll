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

    public function selectAll($table, $inicio=null, $rows_count=null)
    {
        $sql = "select * from {$table}";

        if($inicio >= 0 && $rows_count > 0)
        {
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

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
    
    public function countAll($table)
    {
        $sql = "select COUNT(*) from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectOne($table, $id) {
        $sql = sprintf('SELECT * FROM %s WHERE id=:id LIMIT 1', $table); 
        
        try { 
            $stmt = $this->pdo->prepare($sql); 
            $stmt->execute(['id' => $id]); 
            return $stmt->fetch(PDO::FETCH_OBJ); 
            } 
        
        catch (Exception $e) { 
            die($e->getMessage()); 
        }
    }


    public function insert($table, $parameters, $image){
        
        $pasta = 'uploads/';

        $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
        
        $nome_img = uniqid() . '.' . $extensao;
        
        $caminho_img = $pasta.basename($nome_img);
    
        move_uploaded_file($image['tmp_name'], $caminho_img);

        $parameters['imagem'] = $caminho_img;

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters))); 

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    } catch (Exception $e) {
        die($e->getMessage());
    }
    }

public function update($table, $id, $parameters, $image, $fotoAtual)
{
    if ($image && isset($image['tmp_name']) && $image['tmp_name']) {
        // Remove a imagem antiga se existir
        if (file_exists($fotoAtual)) {
            unlink($fotoAtual);
        }

        // Processa a nova imagem
        $pasta = "uploads/";
        $extensao = pathinfo($image['name'], PATHINFO_EXTENSION);
        $nomeimg = uniqid() . '.' . $extensao;
        $caminhoimg = $pasta . basename($nomeimg);
        move_uploaded_file($image['tmp_name'], $caminhoimg);

        $parameters['imagem'] = $caminhoimg;
    } else {
        unset($parameters['imagem']); // Não altera a imagem se nenhuma for enviada
    }

    $sql = sprintf(
        'UPDATE %s SET %s WHERE id = :id',
        $table,
        implode(', ', array_map(function ($param) {
            return "$param = :$param";
        }, array_keys($parameters)))
    );

    $parameters['id'] = $id;

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
    
    
    public function delete($table, $id)
    {
         $sql = sprintf('DELETE FROM %s WHERE %s',
         $table,
         'id = :id'
        );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(compact('id'));

    } catch (Exception $e) {
        die($e->getMessage());
    }
    }

}
