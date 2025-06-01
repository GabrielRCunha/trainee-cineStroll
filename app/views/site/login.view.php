<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
</head>

<body>
    <div id="logo">
        <a href="#">
            <img src="../../../public/assets/logo_cinestroll.png" alt="Logo CINE STROLL">
        </a>
    </div>

    <div id="texto-login">
        <h1>Entrar</h1>
        <h2>Digite o email e senha da sua conta.</h2>
    </div>

    <div id="caixa-login">
     <form action="/login" method="POST">
        <div class="formulario">
            <p id="titulo-email">Endereço de email</p>
            <input type="email" id="input-email" class="barra-formulario">
        </div>
        <div class="formulario">
            <p id="titulo-senha">Senha</p>
            <div id="div-barra-senha" class="formulario">
                <input type="password" id="input-senha" class="barra-formulario">
                <i class="bi bi-eye" id="mostrar-senha" onclick="mostrarSenha('mostrar-senha', 'input-senha')"></i>
            </div>
        </div>
        <div class="botao">
            <button id="botao-entrar">
                <a href="">
                    <div id="texto-botao">
                        <p>Entrar</p>
                    </div>
                </a>
            </button>
        </div>
     </form>
    </div>

</body>

<script src="../../../public/js/login.js"></script>

</html>