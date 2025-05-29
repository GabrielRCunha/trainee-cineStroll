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

    <div class="fundoModal" onclick="fecharModalAberto('.modal')">

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
<?php require('\modaisUsuarios\modal_criar.php'); ?>

<?php foreach($usuarios as $usuario): ?>
    <!--Modal Visualizar-->
    <?php require('\modaisUsuarios\modal_visualizar.php'); ?>
<?php endforeach ?>


<!--Modais Rafael-->


    <div class="modal" id="excluir">
        <form id="formExcluir"></form>
        
            <h3>Deseja excluir este usuário?</h3>
            <div class="lixo"> 
                <i class="bi bi-trash"></i>
            </div>            
    
            <div class="botoes-excluir">
                <button class="botaoFecharModalExcluir" onclick="fecharModal('excluir')">Cancelar</button>
                <button class="botaoExcluirConfirmar" onclick="fecharModal('excluir')">Excluir</button>
            </div>
        </form>
    </div>

    <div class="modal" id="editar">
    <form id="formEditar">
        <div class="modalInfo">
            <div class="modalInputs">
                <div class="modalNome">
                    <p>Nome:</p>
                    <input type="text" id="editarNome" value="nomeTeste" placeholder="">
                    <p class="aviso" id="avisoNomeEditar">Nome é obrigatório</p>
                </div>
                <div class="modalEmail">
                    <p>Email:</p>
                    <input type="email" id="editarEmail" value="emailteste@gmail.com" placeholder="">
                    <p class="aviso" id="avisoEmailEditar">Email é obrigatório</p>
                </div>
                <div class="modalSenha">
                    <p>Senha:</p>
                    <input type="password" id="editarSenha" value="00000000" placeholder="">
                    <i class="bi bi-eye" id="iconeEditarSenha" onclick="mostrarSenha('iconeEditarSenha', 'editarSenha')"></i>
                    <p class="aviso" id="avisoSenhaEditar">Senha é obrigatória</p> 
                </div>
            </div>

            <div class="modalFoto" id="fotoPerfilEditar">
                <img src="../../../public/assets/frederiksen.jpg" id="imgPerfilEditar">
                <input type="file" accept="image/jpeg, image/png, image/jpg" id="imgInputEditar" style="display: none;" onchange="mostrarImagemSelecionada(event, 'imgPerfilEditar')">
                <button class="botaoEditarImagem" type="button" onclick="document.getElementById('imgInputEditar').click()">Editar imagem</button>
                <p class="aviso" id="avisoImgEditar"> </p>
            </div>
        </div>

        <div class="botoes-excluir">
            <button class="botaoFecharModalExcluir" type="button" onclick="fecharModal('editar')">Cancelar</button>
            <button class="botaoExcluirConfirmar" onclick="checarCampos('formEditar', 'avisoNomeEditar', 'avisoEmailEditar', 'avisoSenhaEditar', 'avisoImgEditar','editarNome', 'editarEmail', 'editarSenha', 'imgInputEditar','.aviso', 'editar', event)">Salvar</button>
        </div>
    </form>
</div>

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