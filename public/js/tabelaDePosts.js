//Constantes para a paginação
const pagina = document.querySelectorAll('.pagina')
const voltar = document.querySelector('.voltar')
const passar = document.querySelector('.passar')
const logo = document.querySelector('.logo-barra-superior')

//Constante para a mediaQuery
const mediaQuery = window.matchMedia('(max-width: 768px)');

//Variáveis para a atualização da tabela
let titulo_info = document.getElementById('titulo-main')
let conteudosOriginais = [];
let indexPagAtiva = 0;

//Parte de atualização do logo do cabeçalho da tabela
function atualizaLogo() {
    if (window.innerWidth <= 800) {
        logo.classList.add('inativo')
    }
    else {
        logo.classList.remove('inativo')
    }
}

//Parte de concatenação das informações quando a tabela diminui
document.addEventListener('DOMContentLoaded', function () {
    salvaConteudoOriginal();
    verificarTamanho(mediaQuery);

    window.addEventListener('resize', verificarTamanho);
    mediaQuery.addEventListener('change', verificarTamanho);

    window.addEventListener('resize', atualizaLogo);
});

function salvaConteudoOriginal() {
    const linhas = document.querySelectorAll('.tabela tr');
    conteudosOriginais = [];

    for (let i = 1; i < linhas.length; i++) {
        const fontes = linhas[i].querySelectorAll('.fontes');
        conteudosOriginais[i - 1] = [];
        fontes.forEach((el, idx) => {
            conteudosOriginais[i - 1][idx] = el.innerHTML;
        });
    }
}

function mudaTexto() {
    let destinos = document.querySelectorAll('.titulo.fontes')

    for (i = 0; i < destinos.length; i++) {

        let destino = destinos[i];
        let elementos = document.querySelectorAll(`.tabela tr:nth-of-type(${i + 2}) .fontes`);
        let conteudo = '';

        elementos.forEach(el => {
            conteudo += `<p>${el.textContent}</p>`;
            const count = conteudo.split("\n").length - 1;
        })
        destino.innerHTML = conteudo;
    }
}

function restauraTextoOriginal() {
    const linhas = document.querySelectorAll('.tabela tr');
    for (let i = 1; i < linhas.length; i++) {
        const fontes = linhas[i].querySelectorAll('.fontes');
        fontes.forEach((el, idx) => {
            el.innerHTML = conteudosOriginais[i - 1][idx];
        });
    }
}

function verificarTamanho() {
    if (mediaQuery.matches) {
        titulo_info.textContent = "Informações";
        restauraTextoOriginal();
        mudaTexto();
    } else {
        titulo_info.textContent = "Nome";
        restauraTextoOriginal();
    }
}

//Parte de atualização da página clicada na paginação
function trocarPaginaAtiva(index) {
    pagina.forEach(pag => pag.classList.remove('ativa'));
    pagina[index].classList.add('ativa');
    indexPagAtiva = index;
}

pagina.forEach((pag, index) => {
    pag.addEventListener('click', function (event) {
        trocarPaginaAtiva(index);
    })
})

voltar.addEventListener('click', function (event) {
    if (indexPagAtiva > 0) {
        trocarPaginaAtiva(indexPagAtiva - 1)
    }
})

passar.addEventListener('click', function (event) {
    if (indexPagAtiva < pagina.length - 1) {
        trocarPaginaAtiva(indexPagAtiva + 1)
    }
})

window.addEventListener('resize', atualizaLogo)

// Pré-view da imagem selecionada
const inputImagem = document.getElementById('imagem');
const previewImagem = document.getElementById('preview-imagem-selecionada');
const previewContainer = document.getElementById('imagem-preview');

if (inputImagem) {
    inputImagem.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            previewImagem.src = URL.createObjectURL(file);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
            previewImagem.src = '';
        }
    });
}

function erroInputVazio(imagem, erroImagem, titulo, erroTitulo, ano, erroAno, diretor, erroDiretor, nota, erroNota, conteudo, erroConteudo, idForm, event) {
    event.preventDefault();
    let valid = true;
    const imagemId = document.getElementById(imagem).files[0];
    const titleId = document.getElementById(titulo).value;
    const anoId = document.getElementById(ano).value;
    const diretorId = document.getElementById(diretor).value;
    const notaId = document.getElementById(nota).value;
    const conteudoId = document.getElementById(conteudo).value;

    if (!checaImagem(imagemId.name)) {
        document.getElementById(erroImagem).innerText = 'Arquivo deve ser uma imagem.';
        document.getElementById(erroImagem).style.display = 'block';
        valid = false;
    }

    if (!imagemId) {
        document.getElementById(erroImagem).innerText = 'Imagem é obrigatória.';
        document.getElementById(erroImagem).style.display = 'block';
        valid = false;
    }
    if (!titleId) {
        document.getElementById(erroTitulo).innerText = 'Título é obrigatório.';
        document.getElementById(erroTitulo).style.display = 'block';
        valid = false;
    }
    if (!anoId) {
        document.getElementById(erroAno).innerText = 'Ano é obrigatório.';
        document.getElementById(erroAno).style.display = 'block';
        valid = false;
    }
    if (!diretorId) {
        document.getElementById(erroDiretor).innerText = 'Diretor é obrigatório.';
        document.getElementById(erroDiretor).style.display = 'block';
        valid = false;
    }
    if (!notaId) {
        document.getElementById(erroNota).innerText = 'Nota é obrigatória.';
        document.getElementById(erroNota).style.display = 'block';
        valid = false;
    }
    if (!conteudoId) {
        document.getElementById(erroConteudo).innerText = 'Conteúdo é obrigatório.';
        document.getElementById(erroConteudo).style.display = 'block';
        valid = false;
    }
    if (!valid) {
        return;
    }
    document.getElementById(idForm).submit();
}

function checaImagem(nomeArquivo) {
    const partes = nomeArquivo.split('.');
    if (partes.length > 1) {
        const extensao = partes[partes.length - 1].toLowerCase();
        switch (extensao) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                return true;
            default:
                return false;
        }
    }
}
// Função principal de verificação
function verificarPermissaoPost(idAutorPost, modalId) {
    try {
        // Obtenção segura dos IDs
        const usuarioLogadoId = getUserId();
        idAutorPost = parseInt(idAutorPost);

        // Debug (remova depois de testar)
        console.debug('Verificando permissão:', {
            usuarioLogadoId,
            idAutorPost,
            modalId
        });

        if (isNaN(idAutorPost)) {
            console.error('ID do autor inválido:', idAutorPost);
            return false;
        }

        // Comparação estrita
        if (idAutorPost === usuarioLogadoId) {
            return abrirModalSeguro(modalId);
        } else {
            return mostrarPopupPermissao();
        }
    } catch (error) {
        console.error('Erro na verificação de permissão:', error);
        return false;
    }
}

// Funções auxiliares
function getUserId() {
    const userId = document.body.dataset.userId;
    const id = parseInt(userId);
    if (isNaN(id)) {
        console.error('ID do usuário logado inválido:', userId);
        return null;
    }
    return id;
}

function abrirModalSeguro(modalId) {
    if (typeof window.abrirModal === 'function') {
        window.abrirModal(modalId);
        return true;
    }
    console.error('Função abrirModal não encontrada');
    return false;
}

function mostrarPopupPermissao() {
    const popup = document.getElementById('permissionPopup');
    if (popup) {
        popup.style.display = 'block';
        return true;
    }
    console.error('Elemento permissionPopup não encontrado');
    return false;
}

function fecharPopupPermissao() {
    const popup = document.getElementById('permissionPopup');
    if (popup) popup.style.display = 'none';
}

// Event listeners
document.addEventListener('DOMContentLoaded', function () {
    // Fechar popup ao clicar fora
    document.getElementById('permissionPopup')?.addEventListener('click', function (e) {
        if (e.target === this) fecharPopupPermissao();
    });

    // Fechar com ESC
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') fecharPopupPermissao();
    });
});

