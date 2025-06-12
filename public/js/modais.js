function abrirModais(idModal) {
    const modal = document.getElementById(idModal);
    const overlay = document.getElementById('overlay');

    modal.classList.add('ativo');
    overlay.classList.add('ativo');
    document.body.style.overflow = 'hidden';
}

function fecharModais(idModal) {
    const modal = document.getElementById(idModal);
    const overlay = document.getElementById('overlay');

    modal.classList.remove('ativo');
    overlay.classList.remove('ativo');
    document.body.style.overflow = '';
}

document.getElementById('overlay').addEventListener('click', function () {
    const modais = document.querySelectorAll('.modal-container');
    modais.forEach(modal => {
        modal.classList.remove('ativo');
    });
    this.classList.remove('ativo');
    document.body.style.overflow = '';
});

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        const modais = document.querySelectorAll('.modal-container');
        const overlay = document.getElementById('overlay');

        modais.forEach(modal => {
            modal.classList.remove('ativo');
        });
        overlay.classList.remove('ativo');
        document.body.style.overflow = '';
    }
});

function previewImagemSelecionada(event) {
    const input = event.target;
    const previewContainer = document.getElementById('imagem-preview');
    const previewImagem = document.getElementById('preview-imagem-selecionada');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImagem.src = e.target.result;
            previewContainer.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImagem.src = '#';
        previewContainer.style.display = 'none';
    }
}

function mostrarPreviewImagem(input, imgId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(imgId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}