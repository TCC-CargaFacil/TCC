<?php
session_start();
include("adm/conexao.php");

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header("Location: Inicio/login.html");
    exit();
}

$userId = $_SESSION['idMotorista'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmacao']) && $_POST['confirmacao'] === 'confirmar') {
    // Sanitize o ID do usuário
    $userId = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);

    // Crie sua consulta SQL para excluir a conta
    $sql = "DELETE FROM motorista WHERE idMotorista = ?";

    // Use uma declaração preparada para evitar injeção de SQL
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);

    // Execute a consulta
    if ($stmt->execute()) {
        // Se a exclusão for bem-sucedida, redirecione para a página de login ou outra página desejada
        header("Location: login.html");
        exit();
    } else {
        // Se houver um erro na exclusão, você pode lidar com isso de acordo com sua lógica
        echo "Erro ao excluir a conta.";
    }

    // Feche a declaração preparada
    $stmt->close();
} else {
    // Se o formulário não foi enviado corretamente, redirecione para a página de perfil
    header("Location: mostraperfcam.php");
    exit();
}
?>
