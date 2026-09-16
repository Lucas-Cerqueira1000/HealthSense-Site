<?php
// Define o código de resposta HTTP como 503 (Serviço Indisponível)
http_response_code(503);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo1.png">
    <title>Erro de Conexão</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="src/main-style.css">
    <link rel="stylesheet" href="src/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* background-color: #0b1118; */
            background-color: var(--bege);
            /* color: #e2e8f0; */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .error-card {
            /* background: #151d28; */
            background-color: var(--verde);
            border: 1px solid #232f3e;
            border-radius: 16px;
            max-width: 500px;
            width: 100%;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.5s ease-in-out;
        }

        .icon-container {
            width: 80px;
            height: 80px;
            background: rgba(50, 188, 173, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
        }

        .icon-container svg {
            width: 44px;
            height: 44px;
            stroke: #32BCAD;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 12px;
        }

        p {
            font-size: 0.95rem;
            color: white;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .status-box {
            background: #0f172a;
            border-left: 4px solid #32BCAD;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            color: #cbd5e1;
            margin-bottom: 28px;
            text-align: left;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-retry {
            background-color: #32BCAD;
            color: #ffffff;
            border: none;
            padding: 14px 24px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-retry:hover {
            /* background-color: #289b8e; */
            background-color: #1d6324;
        }

        .btn-retry:active {
            transform: scale(0.98);
        }

        .btn-back {
            background: transparent;
            /* color: #94a3b8; */
            color:white;
            border: 1px solid #334155;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-back:hover {
            background-color: var(--vermelho);
            color: #ffffff;
        }

        .countdown {
            margin-top: 20px;
            font-size: 0.8rem;
            /* color: #64748b; */
            color:white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-retry
        {
            background-color: var(--verdeescuro);
            /* color:red; */
        }
    </style>
</head>
<body>

    <div class="error-card">
        <!-- Ícone SVG de Conexão Interrompida -->
        <div class="icon-container">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </div>

        <h1>Erro de conexão</h1>
        
        <p>Não foi possível conectar-se ao servidor neste momento. Por favor, tente novamente em alguns instantes.</p>

        <div class="status-box">
            <strong>Status:</strong> <span id="network-status">Aguarde..</span>
        </div>

        <div class="actions">
            <button class="btn-retry btn-info" onclick="recarregarPagina()">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M160 80 A80 80 0 1 0 240 160" transform="scale(0.09)"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h5M20 20v-5h-5" />
                </svg>
                Tentar Novamente
            </button>
            <a href="javascript:history.back()" class="btn-back">Voltar à Página Anterior</a>
        </div>

        <div class="countdown">
            Tentando reconectar automaticamente em <span id="timer">5</span> segundos...
        </div>
    </div>

    <script>
    // Função para testar a conexão e obter o código/status HTTP real
    async function checarRede() {
        const statusEl = document.getElementById('network-status');

        // 1. Verifica a conexão local do navegador
        if (!navigator.onLine) {
            statusEl.innerText = "Offline (Sem conexão com a internet)";
            statusEl.style.color = "#ef4444";
            return;
        }

        // 2. Faz um ping/requisição para checar a resposta real da aplicação
        try {
            const response = await fetch(window.location.href, { method: 'HEAD', cache: 'no-store' });
            
            if (response.ok) {
                statusEl.innerText = `Conexão Restabelecida (${response.status} OK)`;
                statusEl.style.color = "#22c55e";
            } else {
                statusEl.innerText = `Erro HTTP ${response.status} - ${response.statusText || 'Serviço Indisponível'}`;
                statusEl.style.color = "#f59e0b";
            }
        } catch (error) {
            statusEl.innerText = "Falha na requisição (Servidor inalcançável)";
            statusEl.style.color = "#ef4444";
        }
    }

    // Função para recarregar a página
    function recarregarPagina() {
        window.location.reload();
    }

    // Contador regressivo
    let tempoRestante = 5;
    const timerEl = document.getElementById('timer');

    const interval = setInterval(() => {
        tempoRestante--;
        if (timerEl) timerEl.innerText = tempoRestante;
        if (tempoRestante <= 0) {
            clearInterval(interval);
            recarregarPagina();
        }
    }, 1000);

    // Eventos do navegador para alteração de rede instantânea
    window.addEventListener('online', checarRede);
    window.addEventListener('offline', checarRede);
    
    // Executa a verificação assim que carrega a página
    checarRede();
</script>
</body>
</html>