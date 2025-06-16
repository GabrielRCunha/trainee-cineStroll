const pagina = document.querySelectorAll('.paginacao')
const voltar = document.querySelector('.voltar')
const passar = document.querySelector('.passar')

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