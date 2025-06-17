<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>navbar</title>
</head>

<body>
    <nav class="navbar">
        <div id="logo-navbar">
            <a href="/landingPage">
                <img src="../../../public/assets/logo_cinestroll.png"
                    alt="Logo do CINESTROLL que volta para a tela inicial">
            </a>
        </div>
        <div id="box-botoes">
            <nav class="nav-desktop">
                <a href="#">
                    <img src="../../../public/assets/lupa.png" alt="Ícone da barra de pesquisa em formato de lupa"
                        class="botoes-navbar" id="lupa">
                </a>
                <a href="/listaDePosts">
                    <img src="../../../public/assets/página de posts.png"
                        alt="Ícone da página de posts em formato de cards" class="botoes-navbar">
                </a>
                <a href="/login">
                    <img src="../../../public/assets/perfil.png" alt="Ícone do login em formato de perfil"
                        class="botoes-navbar">
                </a>
            </nav>
        </div>

        <div class="hamburguer">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="nav-mobile">
            <a href="#"><img src="../../../public/assets/lupa.png" alt="Ícone da página de posts em formato de cards"
                    class="botoes-navbar-mobile"> Pesquisar</a>
            <a href="#"><img src="../../../public/assets/página de posts.png"
                    alt="Ícone da página de posts em formato de cards" class="botoes-navbar-mobile"> Página de posts</a>
            <a href="#"><img src="../../../public/assets/perfil.png" alt="Ícone da página de posts em formato de cards"
                    class="botoes-navbar-mobile"> Perfil</a>
        </div>
    </nav>

    <script src="../../../public/js/navbar.js"></script>
</body>

</html>