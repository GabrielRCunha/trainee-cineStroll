const tela = document.querySelector('.fundoModal');

function abrirModal(idModal){
    document.getElementById(idModal).style.display = 'flex';
    tela.style.display = 'block';
}

function fecharModal(idModal){
    document.getElementById(idModal).style.display = 'none';
    tela.style.display = 'none';
}

function fecharModalAberto(classModais){
    const modais = document.querySelectorAll(classModais);
    modais.forEach(element => {
        if(element.style.display === 'flex'){
            fecharModal(element.id)
        }
    });
}

function mostrarSenha(idIcone, idInput){
    const icone = document.getElementById(idIcone);
    const input = document.getElementById(idInput);
    
    if(input.type === 'password'){
        input.setAttribute('type', 'text');
        icone.classList.replace('bi-eye', 'bi-eye-slash');
    }
    else{
        input.setAttribute('type', 'password');
        icone.classList.replace('bi-eye-slash', 'bi-eye');
    }
}