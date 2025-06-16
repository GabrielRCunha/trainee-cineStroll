<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header(header: 'Location: /login');
    }
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


</head>
<body>
    <div class="container"> 

        <div class="mensagem-boas-vindas">
            <p>Bem-vindos à Dashboard, selecione sua próxima cena.</p>
          </div>
        
          <div class="conteudo-principal">
            <div class="Logo">
                <img src="../../../public/assets/Logo sem fundo.png" alt="Logo CODE">
              <div id="logoCine"> CINE STROLL</div>
            </div>

        <div class="Botoes">
            <button id="botao-posts" ><span class="material-symbols-outlined">edit</span> Tabela de Posts</button>
            <button id="botao-usuarios"><span class="material-symbols-outlined">person</span> Tabela de Usuários</button>
            
            <div class="logout">
                <form action = "/logout" method="POST">
                    <button id="botao-logout"><span class="material-symbols-outlined">logout</span> Logout</button>
                </form>
            </div>

                

        </div>
    </div>

    
</body>
</html>