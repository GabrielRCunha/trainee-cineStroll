//Constantes para a paginação
const pagina = document.querySelectorAll('.pagina')
const voltar = document.querySelector('.voltar')
const passar = document.querySelector('.passar')
const logo = document.querySelector('.logo-barra-superior')

//Contante para a mediaQuery
const mediaQuery = window.matchMedia('(max-width: 620px)');

//Variáveis para a atualização da tabela
let titulo_info = document.getElementById('titulo-main')
let conteudosOriginais = [];
let indexPagAtiva = 0;

//Parte de atualização do logo do cabeçalho da tabela
function atualizaLogo() {
    if (window.innerWidth <= 768) {
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
    
    for(i = 0; i < destinos.length; i++) {
        
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