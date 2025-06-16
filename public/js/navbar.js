document.addEventListener('DOMContentLoaded', function () {
    const hamburguer = document.querySelector('.hamburguer');
    const navbar_mobile = document.querySelector('.nav-mobile');

    hamburguer.addEventListener('click', function () {
        hamburguer.classList.toggle('active');
        navbar_mobile.classList.toggle('active');
    });

    document.querySelectorAll('.nav-mobile a').forEach(item => {
        item.addEventListener('click', function () {
            hamburguer.classList.remove('active');
            navbar_mobile.classList.remove('active');
        });
    });
});