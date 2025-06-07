<div class="modal edit" id="editar<?=$usuario->id?>">
    <form id="formEditar" method="POST" action="/listaDeUsuarios/edit" enctype="multipart/form-data">
        <input type="hidden" value="<?= $usuario->id?>" name="fotoAtual"/>
        <div class="modalInfo">
            <div class="modalInputs">
                <div class="modalNome">
                    <p>Nome:</p>
                    <input type="text" id="editarNome" value="<?=$usuario->nome?>" placeholder="" name="nome">
                    <p class="aviso" id="avisoNomeEditar">Nome é obrigatório</p>
                </div>
                <div class="modalEmail">
                    <p>Email:</p>
                    <input type="email" id="editarEmail" value="<?=$usuario->email?>" placeholder="" name="email">
                    <p class="aviso" id="avisoEmailEditar">Email é obrigatório</p>
                </div>
                <div class="modalSenha">
                    <p>Senha:</p>
                    <input type="password" id="editarSenha" value="<?=$usuario->senha?>" placeholder="" name="senha">
                    <i class="bi bi-eye" id="iconeEditarSenha" onclick="mostrarSenha('iconeEditarSenha', 'editarSenha')"></i>
                    <p class="aviso" id="avisoSenhaEditar">Senha é obrigatória</p> 
                </div>
                </div>

                <div class="modalFoto" id="fotoPerfilEditar">
                <img src="/<?= $usuario->imagem ?>"  id="imgPerfilEditar">

                <input type="file" accept="image/jpeg, image/png, image/jpg" id="imgInputEditar" style="display: none;" name="imagem">
                <button class="botaoEditarImagem" type="button" onclick="document.getElementById('imgInputEditar').click()">Editar imagem</button>
                <p class="aviso" id="avisoImgEditar"> </p>
            </div>
        </div>

        <input type="hidden" name="id" value="<?=$usuario->id?>">

        <div class="botoes-excluir">
            <button class="botaoFecharModalEditar" type="button" onclick="fecharModal('editar<?=$usuario->id?>', event )">Cancelar</button>
            <button class="botaoEditarConfirmar" type="submit">Salvar</button>
        </div>
    </form>
</div>
