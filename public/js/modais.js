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