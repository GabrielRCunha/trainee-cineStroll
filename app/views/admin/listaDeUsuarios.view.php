<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários - Admin</title>
    <link rel="stylesheet" href="../../../public/css/listaDeUsuários.css">
    <link rel="stylesheet" href="../../../public/css/modaisRyan.css">
    <link rel="stylesheet" href="../../../public/css/modaisRafael.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="fundoModal" onclick="fecharModalAberto('.modal', event)">

    </div>

    <div class="barra-superior">
        <img src="../../../public/assets/Logo_sem_fundo.png" alt="Logo do CINE STROLL" class="logo-barra-superior">
        <div class="div-titulo">
            <h1 class="nome">Lista de Usuários</h1>
        </div>
        <button class="botao-criar" onclick="abrirModal('criar')">
            Criar <i class="bi bi-plus"></i>
        </button>
    </div>
    <div class="div-tabela">
        <table class="tabela">
            <tr>
                <th class="id">ID</th>
                <th class="titulo" id="titulo-main">Nome</th>
                <th class="autor">Email</th>
                <th class="acoes">Ações</th>
            </tr>
            <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td class="id"><?=$usuario->id?></td>
                <td class="titulo fontes"><?=$usuario->nome?></td>
                <td class="autor fontes"><?=$usuario->email?></td>
                <td class="acoes">
                    <div class="divacoes">
                        <button class="ver" onclick="abrirModal('visualizar<?=$usuario->id?>')"><i class="bi bi-eye"></i></button>
                        <button class="editar" onclick="abrirModal('editar<?=$usuario->id?>')"><i class="bi bi-pencil-square"></i></button>
                        <button class="apagar" onclick="abrirModal('excluir<?=$usuario->id?>')"><i class="bi bi-trash3"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

<!--Modal Criar-->
<?php require('./app/views/admin/modaisUsuarios/modal_criar.php'); ?>

<?php foreach($usuarios as $usuario): ?>
    <!--Modal Visualizar-->
    <?php require('./app/views/admin/modaisUsuarios/modal_visualizar.php'); ?>
    <!--Modal Editar-->
    <?php require('./app/views/admin/modaisUsuarios/modal_editar.php'); ?>
    <!--Modal Excluir-->
    <?php require('./app/views/admin/modaisUsuarios/modal_excluir.php'); ?>

<?php endforeach ?>


<!--Modais Rafael-->

<!--Modal Excluir Inicio-->

<!--Modal Excluir Fim-->

<!--Modal Editar Inicio-->

<!--Modal Editar Fim-->

<!--Modais Rafael Fim-->

    <ul class="paginacao">
        <li><a href="#" class="voltar">&laquo;</a></li>
        <li><a href="#" class="pagina ativa">1</a></li>
        <li><a href="#" class="pagina">2</a></li>
        <li><a href="#" class="pagina">3</a></li>
        <li><a href="#" class="pagina">4</a></li>
        <li><a href="#" class="pagina">5</a></li>
        <li><a href="#" class="pagina">6</a></li>
        <li><a href="#" class="pagina">7</a></li>
        <li><a href="#" class="pagina">8</a></li>
        <li><a href="#" class="pagina">9</a></li>
        <li><a href="#" class="pagina">10</a></li>
        <li><a href="#" class="passar">&raquo;</a></li>
    </ul>
</body>

<script src="../../../public/js/listaDeUsuários.js"></script>
<script src="../../../public/js/modal01.js"></script>

</html>