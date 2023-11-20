<?php
// Inicia a sessão
session_start();

// Destroi todas as variáveis de sessão
session_destroy();

// Redireciona para a página de login
header("Location: 1tela.html");
exit; // Certifica-se de que o script não continua a ser executado após o redirecionamento
?>
