<!doctype html>
<html lang="pt-br">
    <head>
        <title>Formulário de Contato</title>
        <meta charset="utf-8"/>
        <link rel="icon" href="img/logo1.png">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Font Awesome Adicionado para os ícones funcionarem -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="src/main-style.css">

        <style>
        #nossoprojeto 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 20px;
            background-color: var(--verdeescuro);
            padding: 40px;
            color: white;
            flex-direction: column;
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
        #principal
        {
            background-color:var(--verde);
            color: white;
            border-radius: 70px;
            padding: 20px 0;
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
        #nome
        {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 100px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #assunto 
        {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 100px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #mensagem 
        {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 370px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #contato 
        {
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
        #lbl 
        {
            font-size:20px;
            font-weight: bold;
        }
        #mensagem::placeholder
        {
            color: white;
            opacity: 0.7;
        }
        #nome::placeholder
        {
            color: white;
            opacity: 0.7;
        }
        #assunto::placeholder
        {
            color: white;
            opacity: 0.7;
        }
        @media(min-width: 390px)
        {
            #btnEnviar
            {
                position: relative;
                top: 4px;
            }
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
    <body class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar">
                <div class="overlay"></div>
                <div class="logo fs-3">
                    <img src="img/Logo.png" alt="" class="img-fluid ms-5" width="190px" height="150px" id="logo1">
                </div>
                <ul class="nav-links">
                    <li><a href="index.html" id="inicio">Início</a></li>
                    <li><a href="contato.php" class="botoes fw-bold text-decoration-underline" id="contato1">Contato</a></li>
                    <li><a href="login.php" class="botoes" id="entre">Entre</a></li>
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

        <main class="w-100">
            <section id="principal">
                <section id="projeto">
                    <h1 class="text-center m-4">Formas de contatar-nos:</h1>
                    <section id="nossoprojeto">
                        <p class="text-center container contato mb-3">
                            Telefone: (11)4125-2288 <br> 
                            Endereço: Avenida Pereira Barreto - Baeta Neves - São Bernardo do Campo <br> CEP: 09751-000
                        </p>
                        <a class="text-center container contato" href="processa-contato.php" target="_blank" id="email">
                            E-mail: healthsense@gmail.com
                        </a>
                    </section>   
                </section>
            </section>
        </main>

        <footer class="mt-auto container-fluid w-full text-center py-3">
             <div class="text-center container">
              <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
             </div>
        </footer>

        <!-- JS do Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script src="js/main-script.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/header.js"></script>

    </body>
</html>