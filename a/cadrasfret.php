<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

session_start();

// Verifica se o usuário está logado (presumindo que o ID do contratante está na sessão)
if (!isset($_SESSION['idContratante'])) {
    echo "Usuário não autenticado.";
    exit();
}

include("adm/conexao.php");

// Obtém o ID do contratante logado
$idContratante = $_SESSION['idContratante'];

// Obtém o telefone do contratante
$sqlTelefone = "SELECT telefone FROM contratante WHERE idContratante = ?"; 
$stmtTelefone = $con->prepare($sqlTelefone);
$stmtTelefone->bind_param("i", $idContratante);
$stmtTelefone->execute();
$stmtTelefone->bind_result($telefone);
$stmtTelefone->fetch();
$stmtTelefone->close();

// Verifica se o telefone foi obtido com sucesso
if (empty($telefone)) {
    echo "Telefone não encontrado para o contratante logado.";
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recolhe os dados do formulário
    $data_limite_entrega = $_POST['data_limite_entrega'];
    $horario_limite_entrega = $_POST['horario_limite_entrega'];
    $local_saida_carga = $_POST['local_saida_carga'];
    $local_destino_entrega = $_POST['local_destino_entrega'];
    $nome_responsavel_envio = $_POST['nome_responsavel_envio'];
    $nome_responsavel_admissao = $_POST['nome_responsavel_admissao'];
    $preco_entrega = $_POST['preco_entrega'];
    $peso_entrega = $_POST['peso_entrega'];
    $tipo_carga = $_POST['tipo_carga'];

    // Converter a data para o formato desejado
    $data_limite_entrega = DateTime::createFromFormat('d/m/Y', $data_limite_entrega);
    if ($data_limite_entrega !== false) {
        $data_limite_entrega = $data_limite_entrega->format('Y/m/d');
    } else {
        echo "Formato de data inválido!";
        exit(); // ou tome alguma outra ação apropriada
    }

    // Insira os dados no banco de dados, incluindo o telefone
    $sql = "INSERT INTO frete (data_limite_entrega, horario_limite_entrega, local_saida_carga, local_destino_entrega, nome_responsavel_envio, nome_responsavel_admissao, preco_entrega, peso_entrega, tipo_carga, telefone, id_cont) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssdissi", $data_limite_entrega, $horario_limite_entrega, $local_saida_carga, $local_destino_entrega, $nome_responsavel_envio, $nome_responsavel_admissao, $preco_entrega, $peso_entrega, $tipo_carga, $telefone, $idContratante);

    if ($stmt->execute()) {
        // Redirecione para a página 'primeiratelacont.php'
        header('Location: primeiratelacont.html');
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Feche a conexão
    $stmt->close();
    $con->close();
}
?>
