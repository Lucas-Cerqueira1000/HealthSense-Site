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

    // --- 2. OPACIDADE PROGRESSIVA NO SCROLL ---
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (header) {
            const scrollY = window.scrollY;
            const maxScroll = 200; 
            const minOpacity = 0.9; 
            
            let opacity = 1 - (scrollY / maxScroll) * (1 - minOpacity);
            opacity = Math.min(Math.max(opacity, minOpacity), 1);
            
            header.style.opacity = opacity;
        }
    });
});