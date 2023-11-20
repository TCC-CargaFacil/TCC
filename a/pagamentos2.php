<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagamentos - Carga Facil</title>
    <link rel="stylesheet" href="pagamentos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="primeiratelacont.html"><button><img src="Imagens/voltar-fotor-20230628161115.png" alt="#"></button></a>
        <p>Pagamentos</p>
    </header>
    <!--FIM DO CABEÇALHO-->
    <?php
    session_start();

    // Verifica se o usuário (motorista) está logado
    if (!isset($_SESSION['idMotorista'])) {
        echo "Usuário não autenticado.";
        exit();
    }

    include("adm/conexao.php");

    // Obtém o ID do motorista logado
    $idMotorista = $_SESSION['idMotorista'];

    // Consulta SQL para obter as informações necessárias da tabela frete e motorista
    $sql = "SELECT frete.*, motorista.Nome as nome_motorista FROM frete
            INNER JOIN motorista ON frete.id_mot = motorista.idMotorista
            WHERE frete.id_mot = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idMotorista);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<p>Histórico de transações</p>";

        while ($row = $result->fetch_assoc()) {
            // Formate a data e hora conforme necessário
            $data_formatada = date("d/m/Y", strtotime($row['data_limite_entrega']));
            $hora_formatada = date("H:i", strtotime($row['horario_limite_entrega']));

            echo "<table>";
            echo "<tr>";
            echo "<td>{$row['nome_motorista']}</td>";
            echo "<td>R$ {$row['preco_entrega']}</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='color: #4E569D;'>{$data_formatada} às {$hora_formatada}</td>";
            echo "</tr>";
            echo "</table>";
        }
    } else {
        echo "<p>Nenhuma transação encontrada para o motorista logado.</p>";
    }

    // Feche a declaração preparada
    $stmt->close();

    // Feche a conexão
    $con->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
