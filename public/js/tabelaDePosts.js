const pagina = document.querySelectorAll('.pagina')
const voltar = document.querySelector('.voltar')
const passar = document.querySelector('.passar')
const logo = document.querySelector('.logo-barra-superior')

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