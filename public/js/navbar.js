document.addEventListener('DOMContentLoaded', function () {
    const hamburguer = document.querySelector('.hamburguer');
    const navbar_mobile = document.querySelector('.nav-mobile');

    const lupaTriggerDesktop = document.getElementById('lupa-trigger-desktop');
    const searchFormDesktop = document.getElementById('search-form-desktop');
    const searchInputDesktop = document.getElementById('search-input-desktop');

    const lupaTriggerMobile = document.getElementById('lupa-trigger-mobile');
    const searchFormMobile = document.getElementById('search-form-mobile');
    const searchInputMobile = document.getElementById('search-input-mobile');

    if (hamburguer && navbar_mobile) {
        hamburguer.addEventListener('click', function () {
            hamburguer.classList.toggle('active');
            navbar_mobile.classList.toggle('active');
        });
    }

    const toggleSearchBar = (formElement, inputElement, event) => {
        if (event) event.preventDefault();
        if (formElement) {
            formElement.classList.toggle('active');

            if (formElement.classList.contains('active')) {
                if (inputElement) {
                    inputElement.focus();
                }
            }
        }
    };

    if (lupaTriggerDesktop && searchFormDesktop && searchInputDesktop) {
        lupaTriggerDesktop.addEventListener('click', (event) => {
            toggleSearchBar(searchFormDesktop, searchInputDesktop, event);
        });
    }

    if (lupaTriggerMobile && searchFormMobile && searchInputMobile) {
        lupaTriggerMobile.addEventListener('click', (event) => {
            toggleSearchBar(searchFormMobile, searchInputMobile, event);
        });
    }

    document.querySelectorAll('.nav-mobile a').forEach(item => {
        item.addEventListener('click', function () {
            if (hamburguer && navbar_mobile && item !== lupaTriggerMobile) {
                hamburguer.classList.remove('active');
                navbar_mobile.classList.remove('active');
                if (searchFormMobile?.classList.contains('active')) {
                    searchFormMobile.classList.remove('active');
                }
            }
        });
    });
});