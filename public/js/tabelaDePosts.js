let ativa = document.querySelector('.ativa')
const pagina = document.querySelectorAll('.pagina')
pagina.forEach(pag => {
    pag.addEventListener('click', function(event){
        pagina.forEach(p => p.classList.remove('ativa'));
        this.classList.add('ativa')
        ativa = this
    })
})
const seta = document.querySelectorAll('.seta')
seta.forEach(s => {
    s.addEventListener('click', function(event){
        if(s.classList.contains('voltar')){

        }
    })
})