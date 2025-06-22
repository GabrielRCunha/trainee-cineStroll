function abrirModais(idModal) {
    const modal = document.getElementById(idModal);
    const overlay = document.getElementById('overlay');

    overlay.classList.add('ativo');
    modal.classList.add('ativo');
    document.body.style.overflow = 'hidden';
}

function fecharModais(idModal, idForm) {
    const modal = document.getElementById(idModal);
    const overlay = document.getElementById('overlay');

    modal.classList.remove('ativo');
    overlay.classList.remove('ativo');
    document.body.style.overflow = '';

    document.getElementById(idForm).reset();
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

function mostrarErro(idErro, mensagem) {
    const erroElemento = document.getElementById(idErro);
    erroElemento.innerText = mensagem;
    erroElemento.style.display = "block";

    setTimeout(() => {
        erroElemento.style.display = "none";
    }, 5000);
}

function erroInputVazio(
    imgId, imgErro,
    tituloId, tituloErro,
    anoId, anoErro,
    diretorId, diretorErro,
    notaId, notaErro,
    conteudoId, conteudoErro,
    formId, event
) {
    event.preventDefault();

    let erro = false;

    const imagem = document.getElementById(imgId);
    if (!imagem.value) {
        mostrarErro(imgErro, "Adicione uma imagem.");
        erro = true;
    }

    const titulo = document.getElementById(tituloId).value.trim();
    if (titulo === "") {
        mostrarErro(tituloErro, "Preencha o título.");
        erro = true;
    }

    const ano = document.getElementById(anoId).value.trim();
    if (ano === "") {
        mostrarErro(anoErro, "Preencha o ano.");
        erro = true;
    } else if (ano < 1800 || ano > 2025) {
        mostrarErro(anoErro, "Ano deve ser entre 1800 e 2025.");
        erro = true;
    }

    const diretor = document.getElementById(diretorId).value.trim();
    if (diretor === "") {
        mostrarErro(diretorErro, "Preencha o diretor.");
        erro = true;
    }

    const nota = document.getElementById(notaId).value.trim();
    if (nota === "") {
        mostrarErro(notaErro, "Preencha a nota.");
        erro = true;
    } else if (nota < 0 || nota > 10) {
        mostrarErro(notaErro, "Nota deve ser entre 0 e 10.");
        erro = true;
    }

    const conteudo = document.getElementById(conteudoId).value.trim();
    if (conteudo === "") {
        mostrarErro(conteudoErro, "Preencha o conteúdo.");
        erro = true;
    }

    if (!erro) {
        document.getElementById(formId).submit();
    }
}
