
<div class="modal" id="criar">
    <form id="formCriar" method="POST" action="/listaDeUsuarios/create" enctype="multipart/form-data">
        <div class="modalTopo">
            <div class="modalInputs" id="modalInputsC">
                <div class="modalNome">
                    <p>Nome:</p>
                    <input id="nomeInput" type="text" placeholder="Digite o nome" name="nome">
                    <p class="aviso" id="avisoNome">Nome é obrigatório</p>
                </div>
                <div class="modalEmail">
                    <p>Email:</p>
                    <input id="emailInput" type="email" placeholder="Digite o email" name="email">
                    <p class="aviso" id="avisoEmail">Email é obrigatório</p>
                </div>
                <div class="modalSenha">
                    <p>Senha:</p>
                    <input type="password" id="inputSenhaC" placeholder="Digite a senha" name="senha">
                    <i class="bi bi-eye" id="iconeSenhaC" onclick="mostrarSenha('iconeSenhaC', 'inputSenhaC')"></i>
                    <p class="aviso" id="avisoSenha">Senha é obrigatória</p>   
                </div>
            </div>
            <div class="modalDireita">
                <div class="modalFoto" id="fotoPerfilC">
                    <img src="" id="imgPerfil" style="display: none;">
                    <input type="file" name="imagem" accept="image/jpeg, image/png, image/jpg" id="imgInput">
                    <div class="imgBtn" onclick="document.getElementById('imgInput').click()">
                        <p>Adicionar imagem</p>
                        <p>+</p>
                    </div>
                </div>
                <p class="aviso" id="avisoImg">Imagem é obrigatória</p>
                <button class="bi bi-arrow-counterclockwise" id="botaoDesfazerFoto" onclick="desfazerFoto(event)">
                </button>
            </div>
        </div>
        <div class="botaoModalContainer">
            <button class="botaoModal" id="botaoFechar" onclick="fecharModal('criar', event,'nomeInput', 'emailInput', 'inputSenhaC')">Fechar</button>
            <button class="botaoModal" id="botaoCriar" onclick="checarCampos('formCriar', 'avisoNome', 'avisoEmail', 'avisoSenha', 'avisoImg', 'nomeInput', 'emailInput', 'inputSenhaC', 'imgInput', '.aviso', 'criar', event)">Criar</button>
        </div>
    </form>
</div>