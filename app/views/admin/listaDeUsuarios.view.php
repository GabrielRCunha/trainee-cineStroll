<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários - Admin</title>
    <link rel="stylesheet" href="../../../public/css/listaDeUsuários.css">
    <link rel="stylesheet" href="../../../public/css/modaisRyan.css">
    <link rel="stylesheet" href="../../../public/css/modaisRafael.css">
    <link rel="stylesheet" href="../../../public/css/sidebar.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="php">
        <?php require 'sidebar.view.php'; ?>
    </div>

    <div id="permissionPopup" class="popup-overlay">
        <div class="popup-content">
            <div class="popup-icon">
                <i class="bi bi-shield-exclamation"></i>
            </div>
            <div class="popup-title">Acesso Negado</div>
            <div class="popup-message">
                Você não tem permissão para interagir com outros usuários.
                Você só pode visualizar, editar ou excluir suas próprias informações.
            </div>
            <button class="popup-button" onclick="fecharPopupPermissao()">
                Entendi
            </button>
        </div>
    </div>

    <div class="fundoModal" onclick="fecharModalAberto('.modal', event)">
    </div>

    <div class="barra-superior">
        <img src="../../../public/assets/Logo_sem_fundo.png" alt="Logo do CINE STROLL" class="logo-barra-superior">
        <div class="div-titulo">
            <h1 class="nome">Lista de Usuários</h1>
        </div>
        <button class="botao-criar" onclick="verificarPermissaoCriar()">
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
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td class="id"><?= $usuario->id ?></td>
                    <td class="titulo fontes"><?= $usuario->nome ?></td>
                    <td class="autor fontes"><?= $usuario->email ?></td>
                    <td class="acoes">
                        <div class="divacoes">
                            <button
                                class="ver <?= $usuario->id != $idUsuarioLogado && $idUsuarioLogado != 1 ? 'btn-disabled' : '' ?>"
                                onclick="verificarPermissao(<?= $usuario->id ?>, 'visualizar<?= $usuario->id ?>', <?= $idUsuarioLogado ?>)">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button
                                class="editar <?= $usuario->id != $idUsuarioLogado && $idUsuarioLogado != 1 ? 'btn-disabled' : '' ?>"
                                onclick="verificarPermissao(<?= $usuario->id ?>, 'editar<?= $usuario->id ?>', <?= $idUsuarioLogado ?>)">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button
                                class="apagar <?= $usuario->id != $idUsuarioLogado && $idUsuarioLogado != 1 ? 'btn-disabled' : '' ?>"
                                onclick="verificarPermissao(<?= $usuario->id ?>, 'excluir<?= $usuario->id ?>', <?= $idUsuarioLogado ?>)">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <!--Modal Criar-->
    <?php require('./app/views/admin/modaisUsuarios/modal_criar.php'); ?>

    <?php foreach ($usuarios as $usuario): ?>
        <!--Modal Visualizar-->
        <?php require('./app/views/admin/modaisUsuarios/modal_visualizar.php'); ?>
        <!--Modal Editar-->
        <?php require('./app/views/admin/modaisUsuarios/modal_editar.php'); ?>
        <!--Modal Excluir-->
        <?php require('./app/views/admin/modaisUsuarios/modal_excluir.php'); ?>
    <?php endforeach ?>

    <?php require('./app/views/admin/componentes.php/paginacao.php') ?>



    <script src="../../../public/js/listaDeUsuários.js"></script>
    <script src="../../../public/js/modal01.js"></script>
    <script src="../../../public/js/checaUsuario.js"></script>
</body>

</html>