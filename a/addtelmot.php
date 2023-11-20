<?php
// Inclua o arquivo de conexão
include("adm/conexao.php");

// Inicie a sessão se não estiver iniciada
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header("Location: login.html");
    exit();
}

// Obtenha o ID do usuário da sessão
$userId = $_SESSION['idMotorista'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o formulário foi enviado via POST

    // Obtenha o número de telefone do formulário
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

    // Você pode adicionar validações adicionais aqui conforme necessário

    // Sanitize o ID do usuário e o número de telefone
    $userId = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);
    $telefone = filter_var($telefone, FILTER_SANITIZE_STRING);

    // Crie sua consulta SQL para adicionar o telefone
    $sql = "UPDATE motorista SET telefone = ? WHERE idMotorista = ?";

    // Use uma declaração preparada para evitar injeção de SQL
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $telefone, $userId);

    // Execute a consulta
    if ($stmt->execute()) {
        // Redirecione para a página de perfil ou outra página desejada
        header("Location: mostraperfcam.php");
        exit();
    } else {
        // Se houver um erro na execução, você pode lidar com isso de acordo com sua lógica
        echo "Erro ao adicionar o telefone.";
    }

    // Feche a declaração preparada
    $stmt->close();
}

// Se chegou aqui, é uma solicitação GET ou o formulário ainda não foi enviado
?>
