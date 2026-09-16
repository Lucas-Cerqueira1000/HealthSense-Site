// document.addEventListener('DOMContentLoaded', () => {
//     const toggleSwitch = document.querySelector('#checkbox');
//     const body = document.body;
//     const modeLabel = document.querySelector('#mode-label');

//     // Verifica se os elementos existem antes de adicionar o evento
//     if (toggleSwitch) {
//         toggleSwitch.addEventListener('change', (e) => {
//             if (e.target.checked) {
//                 body.classList.add('dark-theme');
//                 modeLabel.textContent = "Modo Claro";
//             } else {
//                 body.classList.remove('dark-theme');
//                 modeLabel.textContent = "Modo Escuro";
//             }
//         });
//     }
// });
// O bloco abaixo verifica a opção do tema selecionado pelo usuário, salvando no navegador.
document.addEventListener('DOMContentLoaded', () => {
    // 1. Seleciona o checkbox do switch de tema
    const toggleSwitch = document.getElementById('checkbox');
    const modeLabel = document.getElementById('mode-label'); // Opcional

    // 2. Verifica as preferências:
    // a) Tema salvo manualmente pelo usuário
    const savedTheme = localStorage.getItem('theme');
    
    // b) Preferência do sistema do usuário (Dark Mode nativo do SO/Navegador)
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

    // 3. Aplica o tema na inicialização
    if (savedTheme === 'dark') {
        // Se a pessoa já escolheu escuro manualmente
        document.body.classList.add('dark-theme');
        if (toggleSwitch) toggleSwitch.checked = true;
    } else if (savedTheme === 'light') {
        // Se a pessoa já escolheu claro manualmente
        document.body.classList.remove('dark-theme');
        if (toggleSwitch) toggleSwitch.checked = false;
    } else if (prefersDarkScheme.matches) {
        // Se não há preferência salva no localStorage, usa a do sistema
        document.body.classList.add('dark-theme');
        if (toggleSwitch) toggleSwitch.checked = true;
    }

    // 4. Função para alternar o tema manualmente via checkbox
    function switchTheme(e) {
        if (e.target.checked) {
            document.body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
        } else {
            document.body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
        }
    }

    // 5. Adiciona o evento de troca manual ao checkbox
    if (toggleSwitch) {
        toggleSwitch.addEventListener('change', switchTheme);
    }

    // 6. Listener para atualizar automaticamente se o usuário alterar o tema no SO
    // (Apenas se ele ainda não tiver fixado uma opção manual no site)
    prefersDarkScheme.addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            if (e.matches) {
                document.body.classList.add('dark-theme');
                if (toggleSwitch) toggleSwitch.checked = true;
            } else {
                document.body.classList.remove('dark-theme');
                if (toggleSwitch) toggleSwitch.checked = false;
            }
        }
    });
});
// Mascara do telefone

const inputCelular = document.getElementById('telefone');

inputCelular.addEventListener('input', (e) => {
    let valor = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
    
    // Limita a quantidade de dígitos
    if (valor.length > 11) valor = valor.slice(0, 11);

    // Formata a máscara
    if (valor.length > 6) {
        valor = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
    } else if (valor.length > 2) {
        valor = valor.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
    } else if (valor.length > 0) {
        valor = valor.replace(/^(\d*)$/, '($1');
    }

    e.target.value = valor;
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