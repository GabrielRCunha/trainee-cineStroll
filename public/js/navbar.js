document.addEventListener('DOMContentLoaded', function () {
    const hamburguer = document.querySelector('.hamburguer');
    const navMobile = document.querySelector('.nav-mobile');

    hamburguer.addEventListener('click', function () {
        hamburguer.classList.toggle('active');
        navMobile.classList.toggle('active');
    });

    // Para fechar o menu mobile quando algum ícone for clicado
    document.querySelectorAll('.nav-mobile a').forEach(item => {
        item.addEventListener('click', function () {
            hamburguer.classList.remove('active');
            navMobile.classList.remove('active');
        });
    });
});