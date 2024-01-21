document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });

    // Adicione este código para fechar o menu ao clicar fora dele
    document.addEventListener('click', function (event) {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnButton = event.target.closest('#mobile-menu-button');

        if (!isClickInsideMenu && !isClickOnButton) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Feche o menu ao redimensionar a tela
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) { // Defina a largura limite para ocultar o menu
            mobileMenu.classList.add('hidden');
        }
    });
});