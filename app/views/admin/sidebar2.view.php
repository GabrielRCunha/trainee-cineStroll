
<aside class="sidebar" id="sidebar">
    <div class="topSidebar">
        <div class="perfilSidebar">
            <img src="../../../public/assets/logo com fundo.png" alt="">
            <i class="fa-solid fa-circle-chevron-left toggleSidebar"></i>
        </div>
        <nav class="contentSidebar">
            <ul>
                <li class="itemSidebar">
                    <a href="landingPage">
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

