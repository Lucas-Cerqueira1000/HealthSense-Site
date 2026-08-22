<?php
include ('Conexao.php');

// Variável para armazenar o estado do SweetAlert
$alert_script = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Limpeza padrão para campos normais contra SQL Injection
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $assunto = mysqli_real_escape_string($con, $_POST['assunto']);
    $mensagem = mysqli_real_escape_string($con, $_POST['mensagem']);          

    // Array preparado para armazenar até 4 caminhos de imagem
    $caminhos = [NULL, NULL, NULL, NULL];

    // Processamento das Múltiplas Imagens (Máximo 4)
    if (isset($_FILES['fotos']) && !empty($_FILES['fotos']['name'][0])) {
        $diretorio_destino = "uploads/";

        // Cria o diretório caso ele não exista
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0755, true);
        }

        // Garante que processaremos no máximo 4 arquivos
        $total_arquivos = min(count($_FILES['fotos']['name']), 4);

        for ($i = 0; $i < $total_arquivos; $i++) {
            $nome_tmp = $_FILES['fotos']['tmp_name'][$i];
            $nome_original = $_FILES['fotos']['name'][$i];
            $erro = $_FILES['fotos']['error'][$i];

            if ($erro === UPLOAD_ERR_OK) {
                // Gera um nome exclusivo para cada imagem enviada
                $extensao = pathinfo($nome_original, PATHINFO_EXTENSION);
                $novo_nome = uniqid("img_", true) . '.' . strtolower($extensao);
                $caminho_final = $diretorio_destino . $novo_nome;

                // Move o arquivo da pasta temporária para o destino final
                if (move_uploaded_file($nome_tmp, $caminho_final)) {
                    $caminhos[$i] = "'" . mysqli_real_escape_string($con, $caminho_final) . "'";
                }
            }
        }
    }

    // Tratamento dos valores para a query SQL (coloca NULL caso a imagem não tenha sido enviada)
    $img1 = $caminhos[0] ?? "NULL";
    $img2 = $caminhos[1] ?? "NULL";
    $img3 = $caminhos[2] ?? "NULL";
    $img4 = $caminhos[3] ?? "NULL";

    // Inserção dos dados do chamado juntamente com as 4 colunas de imagem
    $query = "INSERT INTO tabSuporte (nome, email, assunto, mensagem, imagem1, imagem2, imagem3, imagem4) 
              VALUES ('$nome', '$email', '$assunto', '$mensagem', $img1, $img2, $img3, $img4)";

    $result = mysqli_query($con, $query);

    if($result) 
    {
        $alert_script = "
        <script> 
        Swal.fire({
            title: 'Sucesso!',
            text: 'Mensagem enviada com sucesso!',
            icon: 'success',
        });
        </script>";
    }       
    else 
    {
        $alert_script = "
        <script> 
        Swal.fire({
            title: 'Erro',
            html: 'Não foi possível salvar a mensagem no banco.',
            icon: 'error'
        });
        </script>";
    }
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Suporte Técnico</title>
        <meta charset="utf-8"/>
        <link rel="icon" href="img/logo1.png">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
        <link rel="stylesheet" href="src/main-style.css">
        <style>
        #nossoprojeto {
            display: flex;
            justify-content: center;
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
        #nome {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 100px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #email {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 130px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #principal {
            background-color:var(--verde);
            color: white;
            border-radius: 70px;
        }
        #assunto {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 100px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
        }
        #mensagem {
            background-color: var(--verdeescuro);
            width: 100%;
            max-width: 600px;
            height: 370px;
            resize: none;
            border-radius: 5px;
            font-size: 20px;
            color: white;
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
        #mensagem::placeholder,
        #nome::placeholder,
        #email::placeholder,
        #assunto::placeholder {
            color: white;
            opacity: 0.7;
        }

        /* Estilos ajustados para o botão e animação do spinner */
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
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar">
                <div class="overlay"></div>
                <div class="logo fs-3">
                    <img src="img/Logo.png" alt="" class="img-fluid ms-5" width="190px" height="150px" id="logo1">
                </div>
                <ul class="nav-links fs-3 text-center" id="links">
                    <li><a href="inicial.php" class="botoes1 ">Início</a></li>
                    <li><a href="inicio.php" class="botoes1">Seus Dados</a></li>
                    <li><a href="Comprar.php" class="botoes1">Comprar Pulseira</a></li>
                    <li><a href="Suporte.php" class="botoes1 fw-bold text-decoration-underline links">Suporte Técnico</a></li>
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

        <main class="flex flex-col min-h-screen w-full p-0">
            <br>
            <section id="principal">
            <section id="projeto">
                <br>
                <h1 class="text-center m-4">Suporte Técnico HealthSense:</h1>   
                <p class="text-center container" id="nossoprojeto">Telefone: (11)4125-2288 <br> E-mail: healthsense@gmail.com</p>
            </section>

            <h3 class="text-center m-6">Utilize o formulário abaixo para contatar a nossa equipe de suporte.</h3>
            <br>
            
            <section id="contato">
                <form id="formCadastro" action="Suporte.php" method="POST" enctype="multipart/form-data">
                    <label id="lbl">Nome da Instituição: - Obrigatório</label>
                    <br>
                    <textarea name="nome" id="nome" placeholder="Digite aqui o nome por extenso." required maxlength="200" data-maxlength="200" rows="5"></textarea>
                    <div id="contador">0 / 200</div>
                    <br>
                    <label id="lbl">E-mail: - Obrigatório</label>
                    <br>
                    <textarea name="email" id="email" placeholder="Digite aqui mesmo e-mail informado no ato do cadastro." required maxlength="256" data-maxlength="256" rows="5"></textarea>
                    <div id="contador">0 / 256</div>
                    <br>
                    <label id="lbl">Assunto: - Obrigatório</label>
                    <br>
                    <textarea name="assunto" id="assunto" placeholder="Digite aqui o assunto da mensagem." required data-maxlength="150"></textarea>
                    <div id="contador">0 / 150</div>
                    <br>
                    <label id="lbl">Mensagem: - Obrigatório</label>
                    <br>
                    <textarea name="mensagem" id="mensagem" placeholder="Digite aqui a sua mensagem." required data-maxlength="700"></textarea>
                    <div id="contador">0 / 700</div>
                    <br>
                    
                    <!-- Campo de seleção de imagem do usuário -->
                    <label id="lbl">Imagens: - Opcional (Máximo 4)</label>
                    <input type="file" accept="image/*" id="inputFotos" multiple class="form-control bg-dark text-white mb-2">
                    
                    <!-- Input oculto manipulado via JS para o envio do formulário -->
                    <input type="file" name="fotos[]" id="fotosFinal" multiple class="d-none">

                    <!-- Container onde as miniaturas das imagens serão exibidas -->
                    <div id="previewContainer" class="d-flex flex-wrap gap-2 my-3"></div>
                    <br>

                    <div class="text-center">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-success">
                            <span class="texto-botao">Cadastrar</span>
                            <span class="spinner"></span>
                        </button>
                        <button type="reset" class="btn btn-danger">Limpar Mensagem</button>
                    </div>
                </form>
            </section>
            <br>
            </section>
            <br><br>
        </main>

        <footer class="mt-auto container-fluid w-full text-center">
             <div class="text-center container">
              <h3 class="text-center container" id="copy">&copy; HealthSense Systems</h3>
             </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/main-script.js"></script>
        <script src="js/scripts.js"></script>

        <!-- Contador de caracteres -->
        <script>
        document.querySelectorAll('textarea[data-maxlength]').forEach(textarea => {
          const limite = parseInt(textarea.getAttribute('data-maxlength'), 10);
          const contador = textarea.nextElementSibling;

          textarea.addEventListener('input', () => {
            if (textarea.value.length > limite) {
              textarea.value = textarea.value.substring(0, limite);
            }
            
            if (contador) {
              contador.textContent = `${textarea.value.length} / ${limite}`;
            }
          });
        });
        </script>

        <!-- Gerenciamento de Upload, Limite de 4 Imagens e Remoção -->
        <script>
        const inputFotos = document.getElementById('inputFotos');
        const fotosFinal = document.getElementById('fotosFinal');
        const previewContainer = document.getElementById('previewContainer');
        const dt = new DataTransfer();

        inputFotos.addEventListener('change', function (e) {
            const files = Array.from(e.target.files);

            files.forEach(file => {
                if (dt.items.length < 4) {
                    dt.items.add(file);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Limite Atingido',
                        text: 'Você só pode anexar no máximo 4 imagens.'
                    });
                }
            });

            fotosFinal.files = dt.files;
            renderPreview();
            inputFotos.value = ''; 
        });

        function renderPreview() {
            previewContainer.innerHTML = '';

            Array.from(dt.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const div = document.createElement('div');
                    div.className = 'position-relative d-inline-block';
                    div.innerHTML = `
                        <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid white;">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle p-1" style="line-height: 1;" onclick="removerImagem(${index})">&times;</button>
                    `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removerImagem(index) {
            dt.items.remove(index);
            fotosFinal.files = dt.files;
            renderPreview();
        }

        document.querySelector('form').addEventListener('reset', () => {
            dt.items.clear();
            fotosFinal.files = dt.files;
            previewContainer.innerHTML = '';
        });
        </script>

        <!-- Acionamento do Spinner no Envio -->
        <script>
        const formCadastro = document.getElementById("formCadastro");
        const botaosalvar = document.getElementById("btnEnviar");
            
        if (formCadastro && botaosalvar) {
            formCadastro.addEventListener("submit", function(e) {
                // 1. Ativa a classe do spinner no botão
                botaosalvar.classList.add("ativo");
                
                // 2. Desabilita cliques adicionais após o clique inicial
                setTimeout(function() {
                    botaosalvar.disabled = true;
                }, 10);
            });
        }
        </script>
        <?php echo $alert_script; ?>
    </body>
</html>