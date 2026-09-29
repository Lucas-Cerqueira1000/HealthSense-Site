<?php
// 1. Definição das variáveis de destino e mensagem
$emailDestinatario = "healthsensecontato@gmail.com";
$assunto           = "Suporte Técnico via Formulário Web";
$mensagem          = "";

// 2. Codificação adequada para formato de URL (espaços, quebras de linha \n e acentos)
$assuntoFormatado  = rawurlencode($assunto);
$mensagemFormatada = rawurlencode($mensagem);

// 3. Montagem do link para abertura direta na versão Web do Gmail
// 'view=cm' define visualização de composição, 'fs=1' abre em tela cheia e 'to' define o destinatário
$urlGmailWeb = "https://mail.google.com/mail/?view=cm&fs=1&to={$emailDestinatario}&su={$assuntoFormatado}&body={$mensagemFormatada}";

// 4. Redireciona o navegador do usuário diretamente para a página do Gmail preenchida
header("Location: " . $urlGmailWeb);
exit;
?>