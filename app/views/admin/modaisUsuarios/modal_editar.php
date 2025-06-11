<div class="modal edit" id="editar<?=$usuario->id?>">
    <form id="formEditar<?=$usuario->id?>" method="POST" action="/listaDeUsuarios/edit" enctype="multipart/form-data">
        <input type="hidden" value="<?= $usuario->imagem?>" name="fotoAtual"/>
        <div class="modalInfo">
            <div class="modalInputs">
                <div class="modalNome">
                    <p>Nome:</p>
                    <input type="text" id="editarNome<?=$usuario->id?>" value="<?=$usuario->nome?>" placeholder="" name="nome">
                    <p class="aviso" id="avisoNomeEditar<?=$usuario->id?>">Nome é obrigatório</p>
                </div>
                <div class="modalEmail">
                    <p>Email:</p>
                    <input type="email" id="editarEmail<?=$usuario->id?>" value="<?=$usuario->email?>" placeholder="" name="email">
                    <p class="aviso" id="avisoEmailEditar<?=$usuario->id?>">Email é obrigatório</p>
                </div>
                <div class="modalSenha">
                    <p>Senha:</p>
                    <input type="password" id="editarSenha<?=$usuario->id?>" value="<?=$usuario->senha?>" placeholder="" name="senha">
                    <i class="bi bi-eye" id="iconeEditarSenha<?=$usuario->id?>" onclick="mostrarSenha('iconeEditarSenha<?=$usuario->id?>', 'editarSenha<?=$usuario->id?>')"></i>
                    <p class="aviso" id="avisoSenhaEditar<?=$usuario->id?>">Senha é obrigatória</p> 
                </div>
                </div>

                <div class="modalFoto" id="fotoPerfilEditar<?=$usuario->id?>">
                <img src="/<?= $usuario->imagem ?>"  id="imgPerfilEditar<?=$usuario->id?>">

                <input type="file" accept="image/jpeg, image/png, image/jpg" id="imgInputEditar<?=$usuario->id?>" style="display: none;" name="imagem">
                <button class="botaoEditarImagem" type="button" onclick="document.getElementById('imgInputEditar<?=$usuario->id?>').click()">Editar imagem</button>
                <p class="aviso" id="avisoImgEditar<?=$usuario->id?>"> </p>
            </div>
        </div>

        <input type="hidden" name="id" value="<?=$usuario->id?>">

        <div class="botoes-excluir">
            <button class="botaoFecharModalEditar" type="button" onclick="fecharModal('editar<?=$usuario->id?>', event )">Cancelar</button>
            <button class="botaoEditarConfirmar" type="button" onclick="checarCamposEditar(
        'formEditar<?=$usuario->id?>',
        'avisoNomeEditar<?=$usuario->id?>',
        'avisoEmailEditar<?=$usuario->id?>',
        'avisoSenhaEditar<?=$usuario->id?>',
        'editarNome<?=$usuario->id?>',
        'editarEmail<?=$usuario->id?>',
        'editarSenha<?=$usuario->id?>',
        '.aviso',
        'editar<?=$usuario->id?>',
        event
    )">Salvar</button>
        </div>
    </form>
</div>
