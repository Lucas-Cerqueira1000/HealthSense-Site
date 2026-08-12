<?php 
// session_start();

// if(!isset($_SESSION['usuario_id'])) {
//     header("Location: login.php");
//     exit;
// }

// // Configurações do Banco de Dados
// $host = 'tcc_bd35.mysql.dbaas.com.br';
// $dbname = 'tcc_bd35';
// $username = 'tcc_bd35';
// $password = 'ROSA123456a#';

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     // Busca as informações atualizadas do hospital logado
//     $stmt = $pdo->prepare("SELECT * FROM `tabHospitais` WHERE ID = :id");
//     $stmt->bindParam(':id', $_SESSION['usuario_id'], PDO::PARAM_INT);
//     $stmt->execute();
//     $dadosHospital = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     if (!$dadosHospital) {
//         echo "Dados do hospital não encontrados.";
//         exit;
//     }
    
//     // Força a atualização do nome da sessão com o dado real vindo do banco
//     $_SESSION['usuario_nome'] = $dadosHospital['nome'];

// } catch (PDOException $e) {
//     echo "Erro na conexão: " . $e->getMessage();
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
        /* Força o SVG do Pix a acompanhar o tamanho exato da classe display-1 */
        .icon-pix , .icon-boleto{
            width: 1em;
            height: 1em;
            font-size: 5rem; /* Ajusta o tamanho idêntico aos ícones do Font Awesome com display-1 */
            vertical-align: middle;
        }
        /* Adicione esta regra nas suas tags <style> */
form div {
    display: flex;
    align-items: center;
    gap: 15px; /* Espaçamento entre radio button, ícone e texto */
    margin-bottom: 15px;
}

.icon-pix {
    width: 1em;
    height: 1em;
    font-size: 5rem;
    display: inline-block; /* Altera o comportamento do SVG */
}
form
{
    display:flex;
    flex-direction:column;
}
    </style>
    <body>
        <header>
            <nav class="navbar">
                <div class="overlay"></div>
                <div class="logo fs-3">
                    <img src="img/Logo.png" alt="" class="img-fluid ms-5" width="190px" height="150px" id="logo1">
                </div>
                <div class="theme-switch-wrapper">
                    <span id="mode-label" class="fw-bold text-white">Modo Escuro</span>
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <div class="slider round"></div>
                    </label>
                </div>
                <ul class="nav-links fs-3">
                    <li><a href="inicio.php" class="botoes1">Início</a></li>
                    <li><a href="Comprar.php" class="fw-bold text-decoration-underline botoes1">Comprar Pulseira</a></li>
                    <!-- <li><a href="Medicos.php" class="botoes1">Médicos</a></li> -->
                    <!-- <li><a href="CadastrarMedicos" class="botoes1">Cadastrar Médicos</a></li> -->
                    <!-- <li><a href="DeletarMedicos.php" class="botoes1">Deletar Médicos</a></li> -->
                    <!-- <li><a href="AlterarDadosMedicos.php" class="botoes1">Alterar Dados Médicos</a></li> -->
                    <a href="Index.html" class="botoes2">Deslogar</a>
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
            <h2 class="text-center">Aqui você pode adquirir o produto da Health Sense Services.</h2>
            <section id="principal">
                <section id="produto">
                    <h3 class="text-center">Formas de Pagamento</h3>
                    <!-- <p></p> -->
                     <!-- <i class="fa-regular fa-credit-card display-1"></i>  -->
                     <form action="" class="">
                        <div class="text-center">
                    
                        <div class="">
                            <input type="radio" name="pagamento" id="credito">
                            <i class="fa-brands fa-cc-mastercard display-1"></i>
                            <label for="credito"><h3 class="m-0">Cartão de Crédito</h3></label>
                        </div>

                        <div class="">
                            <input type="radio" name="pagamento" id="debito">
                            <i class="fa-brands fa-cc-visa display-1"></i>
                            <label for="debito"><h3 class="m-0">Cartão de Débito</h3></label>
                        </div>

                        <div class="">
                            <input type="radio" name="pagamento" id="pix">
                            <svg class="icon-pix" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#32BCAD" d="M109.2 112.5l46.6 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.5-12.6 32.8-12.6 45.2 0zm293.6                     0l46.5 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.6-12.6 32.8-12.6 45.3 0zm-146.8 0l46.5 46.5c12.5 12.5 12.5 32.8 0                     45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.5-12.6 32.8-12.6 45.3 0zm146.8 146.8l46.5 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8                    12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.6-12.5 32.8-12.5 45.3 0z"/>
                            </svg>
                            <label for="pix"><h3 class="m-0">PIX</h3></label>
                        </div>

                        <div>
                            <input type="radio" name="pagamento" id="boleto">
                            <svg class="icon-boleto text-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 5v14M6 5v14M10 5v14M12 5v14M15 5v14M19 5v14M21 5v14"/>
                            </svg>
                            <label for="boleto"><h3 class="m-0">Boleto Bancário</h3></label>
                        </div>
                    </form>
                     </div>
                
              
                    <!-- </form> -->
                     </div>
                </section>
                <section id="valor" class="text-center">
                </section>
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
    </body>
</html>