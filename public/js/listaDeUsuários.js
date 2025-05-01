const pagina = document.querySelectorAll('.pagina')
const voltar = document.querySelector('.voltar')
const passar = document.querySelector('.passar')
const logo = document.querySelector('.logo-barra-superior')
let titulo_info = document.querySelector('#titulo-main')
const mediaQuery = window.matchMedia('(max-width: 426px)');
let indexPagAtiva = 0;

function trocarPaginaAtiva(index) {
    pagina.forEach(pag => pag.classList.remove('ativa'));
    pagina[index].classList.add('ativa');
    indexPagAtiva = index;
}

function atualizaLogo() {
    if (window.innerWidth <= 768) {
        logo.classList.add('inativo')
    }
    else {
        logo.classList.remove('inativo')
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


function verificarTamanho(e) {
    if (e.matches) {
        mudaTexto();
        titulo_info.innerHTML = "Informações"
    }
    else {
        titulo_info.innerHTML = "Nome"
    }
}

window.addEventListener('resize', verificarTamanho)

verificarTamanho(mediaQuery);


mediaQuery.addEventListener('change', verificarTamanho);

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