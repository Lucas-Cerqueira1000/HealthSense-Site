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
        /* Garante que o scrollbar horizontal não apareça por vazamentos */
        overflow-x: hidden; 
    }

    main {
        gap: 20px;
    }

    /* Container Principal */
    #principal {
        background-color: var(--verde, #133928);
        width: 90%;
        max-width: 500px; /* Mantém um tamanho agradável no PC sem ficar gigante */
        margin: 0 auto;
        gap: 20px;
        color: white;
        border-radius: 30px;
        padding: 25px 20px;
        box-sizing: border-box;
    }

    #produto {
        font-size: 1rem;
        width: 100%;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
    }

    /* Ajuste das linhas com os métodos de pagamento */
    form div {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        margin-bottom: 0; /* O gap do form já trata o espaçamento */
    }

    /* Impede que o botão radio encolha */
    form input[type="radio"] {
        flex-shrink: 0;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    /* Padronização do tamanho dos Ícones */
    .fa-brands, .icon-pix, .icon-boleto {
        font-size: 2.2rem !important;
        width: 1.2em;
        height: 1.2em;
        flex-shrink: 0; /* Impede o ícone de sumir ou achatar */
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Ajuste do Texto/Label */
    form label {
        cursor: pointer;
        flex: 1; /* Ocupa o restante do espaço */
        min-width: 0; /* Permite quebrar texto se necessário */
    }

    form label h3 {
        font-size: 1.1rem !important;
        margin: 0;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Campo de Quantidade */
    #qtd {
        background-color: #dc3545;
        color: white;
        font-weight: bold;
        border: none;
        max-width: 100px;
        display: inline-block;
    }

    /* --- MEDIA QUERIES PARA DISPOSITIVOS MÓVEIS --- */
    @media (max-width: 576px) {
        #principal {
            width: 95%;
            padding: 15px;
            border-radius: 20px;
        }

        h1 {
            font-size: 1.5rem !important;
        }

        h2 {
            font-size: 1.1rem !important;
        }

        /* Ajustes sutis no tamanho em telas muito pequenas (Ex: iPhone SE) */
        .fa-brands, .icon-pix, .icon-boleto {
            font-size: 1.8rem !important;
        }

        form label h3 {
            font-size: 0.95rem !important;
        }
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
                    <span id="mode-label" class="fw-bold text-white">Trocar Tema</span>
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <div class="slider round"></div>
                    </label>
                </div>
                <ul class="nav-links fs-3">
                    <!-- <li><a href="inicio.php" class="botoes1">Início</a></li>
                    <li><a href="Comprar.php" class="fw-bold text-decoration-underline botoes1">Comprar Pulseira</a></li>
                    <a href="Index.html" class="botoes2">Deslogar</a> -->
                </ul>

                <!-- <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div> -->
            </nav>   
        </header>
        <main class="flex flex-col min-h-screen vw-100 p-0">
            <!-- <h1 class="fw-bold text-center">Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?>!</h1> -->
            <!-- <h2 class="text-center">Aqui você pode adquirir o produto da Health Sense Services.</h2> -->
             <br>
            <section id="principal">
                <section id="produto">
                    <h3 class="text-center">Selecione abaixo a forma de pagamento desejada</h3>
                    <form action="">
                        <div class="d-flex justify-content-center align-items-center gap-2 my-2">
    <label for="qtd" class="fw-bold fs-5 m-0">Quantidade:</label>
    <input type="number" class="form-control text-center" name="qtd" id="qtd" value="1" min="1" max="20">
</div>

                        <div>
                            <input type="radio" name="pagamento" id="credito" value="0.05">
                            <i class="fa-brands fa-cc-mastercard display-1"></i>
                            <label for="credito"><h3 class="m-0">Cartão de Crédito (+5%)</h3></label>
                        </div>

                        <div>
                            <input type="radio" name="pagamento" id="debito" value="0.02">
                            <i class="fa-brands fa-cc-visa display-1"></i>
                            <label for="debito"><h3 class="m-0">Cartão de Débito (+2%)</h3></label>
                        </div>

                        <div>
                            <input type="radio" name="pagamento" id="pix" value="0" checked>
                            <svg class="icon-pix" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#32BCAD" d="M109.2 112.5l46.6 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.5-12.6 32.8-12.6 45.2 0zm293.6 0l46.5 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.6-12.6 32.8-12.6 45.3 0zm-146.8 0l46.5 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.5-12.6 32.8-12.6 45.3 0zm146.8 146.8l46.5 46.5c12.5 12.5 12.5 32.8 0 45.3l-46.5 46.5c-12.5 12.5-32.8 12.5-45.3 0l-46.5-46.5c-12.5-12.5-12.5-32.8 0-45.3l46.5-46.5c12.6-12.5 32.8-12.5 45.3 0z"/>
                            </svg>
                            <label for="pix"><h3 class="m-0">PIX</h3></label>
                        </div>

                        <div>
                            <input type="radio" name="pagamento" id="boleto" value="0">
                            <svg class="icon-boleto text-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 5v14M6 5v14M10 5v14M12 5v14M15 5v14M19 5v14M21 5v14"/>
                            </svg>
                            <label for="boleto"><h3 class="m-0">Boleto Bancário</h3></label>
                        </div>

                        <h1 class="text-center mt-4">Total: R$<span id="total">0,00</span></h1>
                    </form>
                </section>
                <section id="valor" class="text-center">
                    <div class="text-center">
                        <a href="Pagamento.php" class="btn btn-primary btn-lg btn-block text-center">Pagar</a>
                    </div>
                </section>
            </section>   
            <div class="text-center">
                <a href="Comprar.php" class="btn btn-info btn-lg btn-block text-center">Voltar</a>
            </div>
            <!-- <div class="my-5 py-3"></div> -->
            <br>
        </main>
        
        <footer class="mt-auto container-fluid vw-100 text-center">
            <div class="text-center container">
                <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
            </div>
        </footer>

        <script src="js/main-script.js"></script>
        <script src="js/scripts.js"></script>
        
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

        const carouselContainer = document.querySelector('.carousel-container');
        if(carouselContainer) {
            carouselContainer.addEventListener('mouseenter', () => clearInterval(timer));
            carouselContainer.addEventListener('mouseleave', () => startTimer());
        }
        </script>

        <script>
        const precoBaseProduto = 70.99;
        const inputQtd = document.getElementById('qtd');
        const radios = document.querySelectorAll('input[name="pagamento"]');
        const spanTotal = document.getElementById('total');

        function calcularTotal() {
            let quantidade = parseInt(inputQtd.value) || 0;
            let porcentagemAdicional = 0;

            radios.forEach(radio => {
                if (radio.checked) {
                    porcentagemAdicional = parseFloat(radio.value) || 0;
                }
            });

            let subtotal = precoBaseProduto * quantidade;
            let totalFinal = subtotal + (subtotal * porcentagemAdicional);
            
            spanTotal.textContent = totalFinal.toFixed(2).replace('.', ',');
        }

        inputQtd.addEventListener('input', calcularTotal);
        radios.forEach(radio => radio.addEventListener('change', calcularTotal));

        calcularTotal();
        </script>
    </body>
</html>