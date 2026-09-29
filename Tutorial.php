<?php 
// session_start();

// if(!isset($_SESSION['usuario_id'])) {
//     header("Location: login.php");
//     exit;
// }

// // Configurações do Banco de Dados
// $host = 'tcc_bd35.mysql.dbaas.com.br';$dbname = 'tcc_bd35';
// $username = 'tcc_bd35';$password = 'ROSA123456a#';

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     // Busca as informações atualizadas do hospital logado
//     $stmt =$pdo->prepare("SELECT * FROM `tabHospitais` WHERE ID = :id");
//     $stmt->bindParam(':id', $_SESSION['usuario_id'], PDO::PARAM_INT);$stmt->execute();
//     $dadosHospital =$stmt->fetch(PDO::FETCH_ASSOC);
    
//     if (!$dadosHospital) {
//         echo "Dados do hospital não encontrados.";
//         exit;
//     }
    
//     // Força a atualização do nome da sessão com o dado real vindo do banco
//     $_SESSION['usuario_nome'] =$dadosHospital['nome'];

// } catch (PDOException $e) {
//     // echo "Erro na conexão: " . $e->getMessage();
//     header("Location: erro_conexao.php");
//     exit;
// }
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Comprar Produto</title>
        <meta charset="utf-8" />
        <link rel="icon" href="img/logo1.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        
        <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
    
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f2c06f6363.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="src/main-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                color: white;
            }
            main {
                gap: 20px;
            }
            #principal {
                background-color: var(--verde);
                width: 80vw;
                margin: 0 auto;
                gap: 40px;
                color: white;
                border-radius: 50px;
            }

            /* ALTERAÇÕES DO CARROSSEL CUSTOMIZADO */
            .carousel-container {
                position: relative;
                max-width: 800px;
                margin: auto;
                overflow: hidden; 
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            }

            .carousel-slide {
                display: flex;
                transition: transform 0.5s ease-in-out;
                width: 100%;
            }

            .custom-carousel-item {
                min-width: 100%;
                width: 100%;
                position: relative;
                display: block; 
            }

            .custom-carousel-item img {
                width: 100%;
                height: auto;
                display: block;
            }

            .caption {
                position: absolute;
                bottom: 0;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.6);
                color: #f2f2f2;
                text-align: center;
                padding: 15px 0;
                font-size: 18px;
                z-index: 2;
            }

            .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -35px;
                color: white;
                font-weight: bold;
                font-size: 24px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
                background-color: rgba(0,0,0,0.4);
                border: none;
                z-index: 10;
            }

            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            .prev:hover, .next:hover {
                background-color: rgba(0,0,0,0.8);
            }

            @media(max-width: 845px) {
                .carousel-container {
                    transform: scale(0.8);
                }
            }

            #prints {
                display: flex;
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
                border-radius: 150px;
            }

            #produto {
                font-size: 20px;
            }

            /* --- CORREÇÕES DE RESPONSIVIDADE E TABELAS --- */
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table td, table th {
                word-break: break-word;
                overflow-wrap: break-word;
            }

            .table-responsive-custom {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            @media (max-width: 380px) {
                #principal {
                    width: 95vw;
                    border-radius: 20px;
                }

                #tecnicas {
                    padding-left: 5px;
                    padding-right: 5px;
                }

                table th, table td {
                    padding: 4px !important;
                    font-size: 13px;
                }

                h1 {
                    font-size: 1.5rem !important;
                }

                h3 {
                    font-size: 1.2rem !important;
                }
            }
            @media(max-width:650px) {
              .carousel-container {
                transform: scale(0.9);
              }
            }

            .icon-pix, .icon-boleto {
                width: 1em;
                height: 1em;
                font-size: 5rem;
                display: inline-block;
                vertical-align: middle;
            }

            .opcao-pagamento {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 15px;
            }
            .oculto {
                opacity: 0;
                pointer-events: none; 
            }
            #accordionFlushExample {
                max-width: 130px;
            }
            .alert-primary, .alert-success, .alert-danger {
                transform: scale(0.9);
            }

            /* Estilos de Modais e Zoom/Pan */
            .custom-modal {
              display: none; 
              position: fixed; 
              z-index: 1000; 
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.85);
              justify-content: center;
              align-items: center;
            }

            .fechar-modal {
              position: absolute;
              top: 20px;
              right: 35px;
              color: #fff;
              font-size: 40px;
              font-weight: bold;
              cursor: pointer;
              z-index: 1001;
            }

            .zoom-viewport {
                width: 80vw;
                height: 80vh;
                overflow: hidden;
                position: relative;
                cursor: grab;
                user-select: none;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .zoom-viewport:active {
                cursor: grabbing;
            }

            .zoom-viewport img {
                max-width: 100%;
                max-height: 100%;
                transition: transform 0.05s ease-out;
                transform-origin: center center;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="overlay"></div>
                <div class="logo fs-3">
                    <img src="img/Logo.png" alt="" class="img-fluid ms-5" width="190px" height="150px" id="logo1">
                </div>
                <ul class="nav-links">
                    <li><a href="inicial.php" class="botoes1">Início</a></li>
                    <li><a href="inicio.php" class="botoes1">Seus Dados</a></li>
                    <li><a href="Comprar.php" class="botoes1">Comprar Pulseira</a></li>
                    <li><a href="Tutorial.php" class="botoes1 fw-bold text-decoration-underline">Tutorial</a></li>
                    <li><a href="Suporte.php" class="botoes1">Suporte Técnico</a></li>
                    <a href="Index.html" class="botoes2">Deslogar</a>
                    <div class="theme-switch-wrapper">
                        <span class="theme-icon sun-icon" id="mode-label">☀️</span>
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <span class="theme-icon moon-icon">🌙</span>
                    </div>
                </ul>

                <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>   
        </header>

        <main class="flex flex-col min-h-screen vw-100">
            <h1 class="fw-bold text-center">Aqui, <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?> você encontrará os tutoriais de utilização do nosso produto.</h1>
            
            <section id="principal">
                <section id="produto"><br>
                 <div class="alert alert-primary" role="alert">
                    Tutorial de colocação da <a href="#" class="alert-link" id="abrirModal">pulseira</a>&nbsp;no braço do paciente..
                 </div>
                 <!-- Modal 1 -->
                 <div id="meuModal" class="custom-modal">
                   <span class="fechar-modal">&times;</span>
                   <div class="zoom-viewport">
                       <img id="imagemAmpliada" alt="Imagem ampliada">
                   </div>
                 </div>

                 <div class="alert alert-success" role="alert">
                    Tutorial de remoção da <a href="#" class="alert-link" id="abrirModal1">pulseira</a> do braço do paciente.
                 </div>
                 <!-- Modal 2 -->
                 <div id="meuModal1" class="custom-modal">
                   <span class="fechar-modal">&times;</span>
                   <div class="zoom-viewport">
                       <img id="imagemAmpliada1" alt="Imagem ampliada">
                   </div>
                 </div>

                 <div class="alert alert-danger" role="alert">
                    Tutorial de troca da bateria da <a href="#" class="alert-link" id="abrirModal2">pulseira</a>.
                 </div>
                 <!-- Modal 3 -->
                 <div id="meuModal2" class="custom-modal">
                   <span class="fechar-modal">&times;</span>
                   <div class="zoom-viewport">
                       <img id="imagemAmpliada2" alt="Imagem ampliada">
                   </div>
                 </div>
                </section>
            </section>   
        </main>
        
        <footer class="mt-auto container-fluid vw-100 text-center">
            <div class="text-center container">
                <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
            </div>
        </footer>

        <script src="js/main-script.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/header.js"></script>

        <!-- Carrossel e Botão Topo -->
        <script>
        let slideIndex = 0;
        let timer = null;

        const carouselSlide = document.querySelector(".carousel-slide");
        const slides = document.querySelectorAll(".custom-carousel-item");

        showSlides(false); 
        startTimer(); 

        function startTimer() {
            if (timer) clearInterval(timer);
            timer = setInterval(nextSlide, 4000); 
        }

        function nextSlide() {
            slideIndex++;
            if (slideIndex >= slides.length) {
                slideIndex = 0;
                showSlides(false); 
            } else {
                showSlides(true);
            }
            resetTimer();
        }

        function prevSlide() {
            slideIndex--;
            if (slideIndex < 0) {
                slideIndex = slides.length - 1;
                showSlides(false);
            } else {
                showSlides(true);
            }
            resetTimer();
        }

        function showSlides(withTransition = true) {
            if (!carouselSlide || slides.length === 0) return;

            if (withTransition) {
                carouselSlide.style.transition = "transform 0.5s ease-in-out";
            } else {
                carouselSlide.style.transition = "none";
            }
            
            let offset = -slideIndex * 100;
            carouselSlide.style.transform = `translateX(${offset}%)`;
        }

        function resetTimer() {
            clearInterval(timer);
            startTimer();
        }

        const carouselElem = document.querySelector('.carousel-container');
        if (carouselElem) {
            carouselElem.addEventListener('mouseenter', () => {
                clearInterval(timer);
            });
            carouselElem.addEventListener('mouseleave', () => {
                startTimer();
            });
        }

        const btnTopo = document.getElementById("btn-topo");
        if (btnTopo) {
            window.addEventListener("scroll", function() {
                if (window.scrollY > 300) {
                    btnTopo.classList.remove("oculto");
                } else {
                    btnTopo.classList.add("oculto");
                }
            });
            btnTopo.addEventListener("click", function() {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        }
        </script>

        <!-- Abertura dos Modais -->
        <script>
            // MODAL 1
            const link = document.getElementById("abrirModal");
            const modal = document.getElementById("meuModal");
            const imagemModal = document.getElementById("imagemAmpliada");
            const urlDaImagem = "img/Tutorial_Colocar_Pulseira.png"; 

            if (link) {
                link.onclick = function(evento) {
                    evento.preventDefault();
                    modal.style.display = "flex";
                    imagemModal.src = urlDaImagem;
                }
            }

            // MODAL 2
            const link1 = document.getElementById("abrirModal1");
            const modal1 = document.getElementById("meuModal1");
            const imagemModal1 = document.getElementById("imagemAmpliada1");
            const urlDaImagem1 = "img/Tutorial_Remocao_Pulseira.png"; 

            if (link1) {
                link1.onclick = function(evento) {
                    evento.preventDefault();
                    modal1.style.display = "flex";
                    imagemModal1.src = urlDaImagem1;
                }
            }

            // MODAL 3
            const link2 = document.getElementById("abrirModal2");
            const modal2 = document.getElementById("meuModal2");
            const imagemModal2 = document.getElementById("imagemAmpliada2");
            const urlDaImagem2 = "img/Tutorial_Troca_Bateria.png"; 

            if (link2) {
                link2.onclick = function(evento) {
                    evento.preventDefault();
                    modal2.style.display = "flex";
                    imagemModal2.src = urlDaImagem2;
                }
            }

            // Fechar ao clicar fora ou no botão fechar
            window.onclick = function(evento) {
                if (evento.target.classList.contains('custom-modal') || evento.target.classList.contains('fechar-modal')) {
                    document.querySelectorAll('.custom-modal').forEach(m => {
                        m.style.display = "none";
                    });
                }
            }
        </script>

        <!-- Lógica Geral de Zoom e Navegação pelo Mouse (Pan) -->
        <script>
        document.querySelectorAll('.custom-modal').forEach(modalElement => {
            const viewport = modalElement.querySelector('.zoom-viewport');
            const img = modalElement.querySelector('img');

            if (!viewport || !img) return;

            let scale = 1;
            let pointX = 0;
            let pointY = 0;
            let startX = 0;
            let startY = 0;
            let isDragging = false;

            function updateTransform() {
                img.style.transform = `translate(${pointX}px, ${pointY}px) scale(${scale})`;
            }

            function resetZoom() {
                scale = 1;
                pointX = 0;
                pointY = 0;
                updateTransform();
            }

            // Zoom via Wheel (Scroll do mouse)
            viewport.addEventListener('wheel', (e) => {
                e.preventDefault();
                const zoomFactor = 0.15;
                if (e.deltaY < 0) {
                    scale = Math.min(scale + zoomFactor, 5); // limite máximo 5x
                } else {
                    scale = Math.max(scale - zoomFactor, 1); // limite mínimo 1x
                }

                if (scale === 1) {
                    pointX = 0;
                    pointY = 0;
                }
                updateTransform();
            });

            // Arraste (Pan) com botão do mouse
            viewport.addEventListener('mousedown', (e) => {
                if (scale <= 1) return;
                e.preventDefault();
                isDragging = true;
                startX = e.clientX - pointX;
                startY = e.clientY - pointY;
            });

            viewport.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                pointX = e.clientX - startX;
                pointY = e.clientY - startY;
                updateTransform();
            });

            viewport.addEventListener('mouseup', () => { isDragging = false; });
            viewport.addEventListener('mouseleave', () => { isDragging = false; });

            // Reseta a imagem ao fechar o modal
            const observer = new MutationObserver(() => {
                if (modalElement.style.display === 'none') {
                    resetZoom();
                }
            });
            observer.observe(modalElement, { attributes: true, attributeFilter: ['style'] });
        });
        </script>
    </body>
</html>