function verificarPermissao(idUsuario, modalId, idUsuarioLogado) {
    if (idUsuario != idUsuarioLogado && idUsuarioLogado != 1) {
        mostrarPopupPermissao();
        return false;
    }
    abrirModal(modalId);
}

function mostrarPopupPermissao() {
    document.getElementById('permissionPopup').style.display = 'block';
}

function fecharPopupPermissao() {
    document.getElementById('permissionPopup').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('permissionPopup').addEventListener('click', function (e) {
        if (e.target === this) {
            fecharPopupPermissao();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            fecharPopupPermissao();
        }
    });
});