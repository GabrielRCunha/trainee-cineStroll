<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/sidebar.css">
    <script src="https://kit.fontawesome.com/ee0f4b07be.js" crossorigin="anonymous"></script>
    <title>Sidebar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<aside class="sidebar" id="sidebar">
    <div class="topSidebar">
        <div class="perfilSidebar">
            <img src="../../../public/assets/logo com fundo.png" alt="">
            <i class="fa-solid fa-circle-chevron-left toggleSidebar"></i>
        </div>
        <nav class="contentSidebar">
            <ul>
                <li class="itemSidebar">
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <span class="itemDescription">Página inicial</span>
                    </a>
                </li>
                <li class="itemSidebar">
                    <a href="/dashboard">
                        <i class="fa-solid fa-chart-column">
                        </i>
                        <span class="itemDescription">Dashboard</span>
                    </a>
                </li>
                <li class="itemSidebar">
                    <a href="tabelaDePosts">
                        <i class="fa-solid fa-pen-to-square">
                        </i>
                        <span class="itemDescription">Publicações</span>
                    </a>
                </li>
                <li class="itemSidebar">
                    <a href="listaDeUsuarios">
                        <i class="fa-solid fa-user-pen">
                        </i>
                        <span class="itemDescription">Usuários</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="logoutSidebar">
        <form action="/logout" method="POST">
            <button type="submit" id="buttonLogout">
                <i class="fa-solid fa-right-from-bracket" id="iconLogout"></i>
                <span class="itemDescription">Logout</span>
            </button>
        </form>
    </div>
</aside>
<script src="../../../public/js/sidebar.js"></script>

</html>