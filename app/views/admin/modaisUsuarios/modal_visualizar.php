<div class="modal" id="visualizar<?=$usuario->id?>">
    <div class="modalTopo">
        <div class="modalInputs">
            <div class="modalId">
                <p>ID:</p>
                <input type="text" value="<?=$usuario->id?>" readonly>
            </div>
            <div class="modalNome">
                <p>Nome:</p>
                <input type="text" value="<?=$usuario->nome?>" readonly>
            </div>
            <div class="modalEmail">
                <p>Email:</p>
                <input type="email" value="<?=$usuario->email?>" readonly>
            </div>
            <div class="modalSenha">
                <p>Senha:</p>
                <input type="password" id="inputSenhaV" value="<?=$usuario->senha?>" readonly>
                <i class="bi bi-eye" id="iconeSenhaV" onclick="mostrarSenha('iconeSenhaV', 'inputSenhaV')"></i>
            </div>
        </div>
        <div class="modalFoto" id="fotoPerfilV">
            <img src="../../../public/assets/frederiksen.jpg">
        </div>
    </div>
    <div class="botaoModalContainer">
        <button class="botaoModal" id="botaoFechar" onclick="fecharModal('visualizar<?=$usuario->id?>')">Fechar</button>
    </div>
</div>