const menu = document.querySelector('#mobile-menu');
const navLinks = document.querySelector('.nav-links');
const overlay = document.querySelector('.overlay');
const links = document.querySelectorAll('.nav-links a');

menu.addEventListener('click', () => {
  menu.classList.toggle('active');
  navLinks.classList.toggle('active');
  overlay.classList.toggle('active');
});

// fechar ao clicar no overlay
overlay.addEventListener('click', () => {
  menu.classList.remove('active');
  navLinks.classList.remove('active');
  overlay.classList.remove('active');
});

// fechar ao clicar em um link
links.forEach(link => {
  link.addEventListener('click', () => {
    menu.classList.remove('active');
    navLinks.classList.remove('active');
    overlay.classList.remove('active');
  });
});

window.addEventListener('scroll', function() {
    // Aplica o efeito apenas em telas com largura de até 1300px
    if (window.innerWidth <= 1300) {
        const header = document.querySelector('header');
        const scrollY = window.scrollY;
        
        // Define a distância em pixels na qual a opacidade atingirá o valor mínimo (ex: 200px)
        const maxScroll = 200; 
        // Opacidade mínima desejada (ex: 0.7 = 70% opaco / 30% transparente)
        const minOpacity = 0.7; 
        
        // Calcula a nova opacidade
        let opacity = 1 - (scrollY / maxScroll) * (1 - minOpacity);
        
        // Garante que a opacidade não fique menor que o mínimo nem maior que 1
        opacity = Math.min(Math.max(opacity, minOpacity), 1);
        
        header.style.opacity = opacity;
    }
});