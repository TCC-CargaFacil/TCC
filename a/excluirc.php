<?php
session_start();
include("adm/conexao.php");

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['id'];

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmacao']) && $_POST['confirmacao'] === 'confirmar') {
    // Sanitize o ID do usuário
    $userId = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);

    // Crie sua consulta SQL para excluir a conta
    $sql = "DELETE FROM contratante WHERE idContratante = ?";

    // Use uma declaração preparada para evitar injeção de SQL
    $stmt = $con->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $userId);

        // Execute a consulta
        if ($stmt->execute()) {
            // Se a exclusão for bem-sucedida, redirecione para a página de login ou outra página desejada
            header("Location: login.html");
            exit();
        } else {
            // Se houver um erro na exclusão, você pode lidar com isso de acordo com sua lógica
            echo "Erro ao excluir a conta: " . $stmt->error;
        }

        // Feche a declaração preparada
        $stmt->close();
    } else {
        // Se houver um erro na preparação, você pode lidar com isso de acordo com sua lógica
        echo "Erro na preparação da declaração: " . $con->error;
    }
} else {
    // Se o formulário não foi enviado corretamente, redirecione para a página de perfil
    header("Location: mostraperfcont.php");
    exit();
}
?>
