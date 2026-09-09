document.addEventListener("DOMContentLoaded", function () {
    // --- 1. LÓGICA DO MENU MOBILE ---
    const mobileMenuBtn = document.getElementById("mobile-menu");
    const menuToggle = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector(".nav-links");
    const overlay = document.querySelector(".overlay");

    function toggleMenu() {
        if (menuToggle) menuToggle.classList.toggle("active");
        if (navLinks) navLinks.classList.toggle("active");
        if (overlay) overlay.classList.toggle("active");
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener("click", toggleMenu);
    } else if (menuToggle) {
        menuToggle.addEventListener("click", toggleMenu);
    }

    if (overlay) {
        overlay.addEventListener("click", toggleMenu);
    }

    if (navLinks) {
        const links = navLinks.querySelectorAll("a");
        links.forEach(link => {
            link.addEventListener("click", function () {
                if (navLinks.classList.contains("active")) {
                    toggleMenu();
                }
            });
        });
    }

    // --- 2. GERENCIAMENTO DE SCROLL E ESMAECIMENTO DO HEADER ---
    const header = document.querySelector('header');

    window.addEventListener('scroll', function() {
        if (header) {
            if (window.scrollY > 10) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
    });
});