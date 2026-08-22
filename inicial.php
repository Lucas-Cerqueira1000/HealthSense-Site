<?php 
session_start();

if(!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Configurações do Banco de Dados
$host = 'tcc_bd35.mysql.dbaas.com.br';
$dbname = 'tcc_bd35';
$username = 'tcc_bd35';
$password = 'ROSA123456a#';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Busca as informações atualizadas do hospital logado
    $stmt = $pdo->prepare("SELECT * FROM `tabHospitais` WHERE ID = :id");
    $stmt->bindParam(':id', $_SESSION['usuario_id'], PDO::PARAM_INT);
    $stmt->execute();
    $dadosHospital = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$dadosHospital) {
        echo "Dados do hospital não encontrados.";
        exit;
    }
    
    // Força a atualização do nome da sessão com o dado real vindo do banco
    $_SESSION['usuario_nome'] = $dadosHospital['nome'];

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
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
    </head>
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

        /* Permite a quebra de palavras muito longas nas células */
        table td, table th {
            word-break: break-word;
            overflow-wrap: break-word;
        }

        /* Classe para permitir rolagem horizontal em telas muito pequenas */
        .table-responsive-custom {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Ajustes específicos para telas abaixo de 380px */
        @media (max-width: 380px) {
            #principal {
                width: 95vw; /* Aumenta a área visível do container */
                border-radius: 20px; /* Borda mais suave para não espremer */
            }

            #tecnicas {
                padding-left: 5px;
                padding-right: 5px;
            }

            table th, table td {
                padding: 4px !important;
                font-size: 13px; /* Reduz levemente o texto para caber nas colunas */
            }

            h1 {
                font-size: 1.5rem !important;
            }

            h3 {
                font-size: 1.2rem !important;
            }
        }
        @media(max-width:650px)
        {
          .carousel-container
          {
            transform: scale(0.9);
          }
        }
        #dinheiro
        {
          /* background-color: var(--vermelho); */
          /* width: 30px; */
        }

        /* Garante que os SVG e ícones tenham o mesmo tamanho e comportamento */
        .icon-pix, .icon-boleto {
            width: 1em;
            height: 1em;
            font-size: 5rem; /* Tamanho equivalente à classe display-1 */
            display: inline-block;
            vertical-align: middle;
        }

        /* Alinhamento flexível para os itens de pagamento */
        .opcao-pagamento {
            display: flex;
            align-items: center;
            gap: 15px; /* Espaçamento entre ícone e texto */
            margin-bottom: 15px;
        }
        .oculto 
        {
            opacity: 0;
            pointer-events: none; 
        }
    </style>
    <body>
        <header>
            <!-- <p id="texto">Voltar ao topo.</p>
            <button id="btn-topo" class="oculto">↑</button> -->
            <nav class="navbar">
                <div class="overlay"></div>
                <div class="logo fs-3">
                    <img src="img/Logo.png" alt="" class="img-fluid ms-5" width="190px" height="150px" id="logo1">
                </div>
                <ul class="nav-links fs-3">
                    <li><a href="inicial.php" class="botoes1 fw-bold text-decoration-underline ">Início</a></li>
                    <li><a href="inicio.php" class="botoes1">Seus Dados</a></li>
                    <li><a href="Comprar.php" class="botoes1">Comprar Pulseira</a></li>
                    <li><a href="Suporte.php" class="botoes1">Suporte Técnico</a></li>
                    <a href="Index.html" class="botoes2">Deslogar</a>
                    <div class="theme-switch-wrapper">
                        <span id="mode-label" class="fw-bold text-white">Trocar Tema</span>
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <div class="slider round"></div>
                        </label>
                    </div>
                </ul>

                <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>   
        </header>
        <main class="flex flex-col min-h-screen vw-100 p-0">
            <h1 class="fw-bold text-center">Bem vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?>!</h1>
            
            <section id="principal">
                <section id="produto">
                    <br>
                    <h1 class="text-center">Algumas notícias do projeto HealthSense</h1>
                     
                    <!-- <div class="carousel-container">
                        <div class="carousel-slide">
                            <div class="custom-carousel-item">
                                <img src="img/albert.jpg" alt="Imagem da pulseira" class="rounded img-thumbnail shadow">
                                <div class="caption"><a href="" class="fw-bold" style="color: var(--vermelho);">G1</a></div>
                            </div>
                            
                            <div class="custom-carousel-item">
                                <img src="img/sao-paulo.jpg" alt="Imagem da pulseira no braço do paciente" class="rounded img-thumbnail shadow">
                                <div class="caption"><a href="" class="fw-bold" style="color: var(--vermelho);">Estadão</a></div>
                            </div>

                            <div class="custom-carousel-item">
                                <img src="img/3.png" alt="Imagem da pulseira no braço do paciente e visualização do aplicativo com eletrocardiograma" class="rounded img-thumbnail shadow">
                                <div class="caption"><a href="" class="fw-bold" style="color: var(--vermelho);">Estado de São Paulo</a></div>
                            </div>
                        </div>

                        <button class="prev" onclick="prevSlide()">&#10094;</button>
                        <button class="next" onclick="nextSlide()">&#10095;</button>
                    </div> -->
                </section>
                <br>
    <div class="container my-4">
  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="card h-100 bg-warning">
        <div class="card-body">
          <h5 class="card-title text-center"><a href=""> G1</a></h5>
          <p class="card-text">Matéria do G1 sobre o interesse do Hospital Israelita Albert Einstein no projeto.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card h-100 bg-secondary">
        <div class="card-body">
          <h5 class="card-title text-center"><a href=""> Estadão</a></h5>
          <p class="card-text">Matéria do Estadão sobre teste da pulseira em projetos sociais no centro de São Paulo.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card h-100 bg-success">
        <div class="card-body">
          <h5 class="card-title text-center"><a href=""> Folha de São Paulo</a></h5>
          <p class="card-text">Matéria do jornal Folha de São Paulo sobre os resultados da utilização do equipamento no Hospital São Paulo.</p>
        </div>
      </div>
    </div>
  </div>
</div>

           
            </section>   
            <div class="my-5 py-3"></div>
        </main>
        
        <footer class="mt-auto container-fluid vw-100 text-center">
            <div class="text-center container">
                <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
            </div>
        </footer>

        <script src="js/main-script.js"></script>
        <script src="js/scripts.js"></script>
        <script>
        // ==========================================
        // CARROSSEL CORRIGIDO
        // ==========================================
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

        document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
            clearInterval(timer);
        });

        document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
            startTimer();
        });
        </script>
        <script>
                const btnTopo = document.getElementById("btn-topo");
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
        </script>
    </body>
</html>