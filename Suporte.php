<!doctype html>
<html lang="pt-br">
    <head>
        <title>Suporte Técnico</title>
        <meta charset="utf-8"/>
        <link rel="icon" href="img/logo1.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="src/main-style.css">
        <style>
        #nossoprojeto {
            display: flex;
            justify-content: center;
            flex-direction:column;
            align-items: center;
            text-align: center;
            font-size: 20px;
            background-color: var(--verdeescuro);
            padding: 40px;
            color: white;
            border-radius: 40px;
            margin: 20px auto;
            max-width: 90%;
        }
        #prints {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        @media(max-width: 1000px) {
            #prints {
                flex-direction: column;
                align-items: center;
            }
            footer, main {
                top: 0;
            }
        }
        #nome, #email, #assunto, #mensagem {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #nome, #assunto { height: 100px; }
        #email { height: 130px; }
        #mensagem { height: 370px; }
        #principal {
            background-color:var(--verde);
            color: white;
            border-radius: 70px;
        }
        #contato {
            display: flex;
            flex-direction: column;
            justify-content: baseline;
            align-items: center;
            width: 100%;
            padding: 0 15px;
        }
        #contato form {
            width: 100%;
            max-width: 600px;
        }
        #lbl {
            font-size:20px;
            font-weight: bold;
        }
        #mensagem::placeholder, #nome::placeholder, #email::placeholder, #assunto::placeholder {
            color: white;
            opacity: 0.7;
        }

        #btnEnviar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        #btnEnviar.ativo .spinner {
            display: inline-block;
        }
        #e-mail
        {
            color:var(--vermelho);
        }
        #e-mail:hover
        {
            color:var(--verde);
            font-weight:bold;
        }
        #email
        {
            color: var(--vermelho);
            cursor: pointer;
            text-decoration: none;
            position: relative;     /* Referência para a linha do ::after */
            display: inline-block;  /* Ajusta a largura apenas ao texto */
            background: transparent;
            height: auto;           /* Remove a altura fixa de 130px que gerava o espaço em branco */
        }
        /* Estilização básica do texto */
        /* Criando a linha com o pseudo-elemento */
        #email::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px; /* Espessura da linha */
            bottom: -4px; /* Distância da linha em relação ao texto */
            left: 0;
            background-color: var(--vermelho); /* Cor da linha */
            
            /* O segredo da animação está aqui */
            transform: scaleX(0); /* Começa com tamanho zero (invisível) */
            transform-origin: center; /* Garante que cresça a partir do centro */
            transition: transform 0.3s ease-in-out; /* Define a velocidade da animação */
        }

        /* Efeito ao passar o mouse (Hover) */
        #email:hover::after {
            transform: scaleX(1); /* Expande para o tamanho total (100%) */
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
                <ul class="nav-links text-center" id="links">
                    <li><a href="inicial.php" class="botoes1">Início</a></li>
                    <li><a href="inicio.php" class="botoes1">Seus Dados</a></li>
                    <li><a href="Comprar.php" class="botoes1">Comprar Pulseira</a></li>
                    <li><a href="Tutorial.php" class="botoes1">Tutorial</a></li>
                    <li><a href="Suporte.php" class="botoes1 fw-bold text-decoration-underline links">Suporte Técnico</a></li>
                    <a href="Index.html" class="botoes2">Deslogar</a>
                    <!-- <div class="theme-switch-wrapper">
                        <span id="mode-label" class="fw-bold text-white">Trocar Tema</span>
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <div class="slider round"></div>
                        </label>
                    </div> -->
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

        <main class="flex flex-col min-h-screen w-full">
            <section id="principal">
                <br>
                <h1 class="text-center m-4">Suporte Técnico HealthSense:</h1>   
                <div id="nossoprojeto">
                    <p class="text-center container" id="">Telefone: (11)4125-2288</p><br>
                    <p class="text-center container">Atendimento 7 dias por semana, das 06:00 horas da manhã até as 18:00 da tarde.</p>
                    <a class="text-center container" id="email" href="processa-suporte.php" target="_blank">E-mail: healthsense@gmail.com</a>
                </div>
            </section>            
        </main>

        <footer class="mt-auto container-fluid w-full text-center">
             <div class="text-center container">
              <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
             </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/main-script.js"></script>
        <script src="js/header.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>