<?php
session_start();

// Verifique se o usuário (motorista) está logado
if (!isset($_SESSION['idMotorista'])) {
    echo "Usuário não autenticado.";
    exit();
}

include("adm/conexao.php");

// Obtém o ID do motorista logado
$idMotorista = $_SESSION['idMotorista'];

// Verifica se o frete foi aceito (você precisa ajustar essa lógica dependendo de como o aceite da corrida é implementado em seu sistema)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aceitar_corrida'])) {

    // Obtém o ID do frete (você precisa ajustar isso dependendo de como você está identificando o frete)
    $idFrete = $_POST['id_frete'];

    // Obtém o número de telefone do motorista
    $sqlTelefoneMotorista = "SELECT telefone FROM motorista WHERE idMotorista = ?";
    $stmtTelefoneMotorista = $con->prepare($sqlTelefoneMotorista);
    $stmtTelefoneMotorista->bind_param("i", $idMotorista);
    $stmtTelefoneMotorista->execute();
    $stmtTelefoneMotorista->bind_result($telefoneMotorista);
    $stmtTelefoneMotorista->fetch();
    $stmtTelefoneMotorista->close();

    // Atualize a tabela frete com o ID do motorista e o número de telefone
    $sql = "UPDATE frete SET id_mot = ?, telefonecam = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $idMotorista, $telefoneMotorista, $idFrete);

    if ($stmt->execute()) {
        // Redirecione para a página 'primeiratela.php'
        header('Location: primeiratela.php');
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        echo "Erro ao aceitar a corrida: " . $stmt->error;
    }

    $stmt->close();
}

// Feche a conexão
$con->close();
?>
