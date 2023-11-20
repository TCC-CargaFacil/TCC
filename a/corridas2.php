<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corridas - Carga Facil</title>
    <link rel="stylesheet" href="corridas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="primeiratelacont.html"><button><img src="Imagens/voltar-fotor-20230628161115.png" alt="#"></button></a>
        <p>Corridas</p>
    </header>

    <!-- Adicionei a verificação do id_cont aqui -->
    <?php
    session_start();

    // Verifica se o contratante está autenticado (presumindo que o ID do contratante está na sessão)
    if (!isset($_SESSION['idContratante'])) {
        echo "Contratante não autenticado.";
        exit();
    }

    include("adm/conexao.php");

    // Obtém o ID do contratante logado
    $idContratante = $_SESSION['idContratante'];

    // Consulta para obter informações da tabela frete com base no id_cont
    $sql = "SELECT * FROM frete WHERE id_cont = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $idContratante);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<p>Histórico de corridas</p>";
        echo "<table style='margin: 10px;'>";
        echo "<tr><th>Data</th><th>Horário</th><th>Preço</th></tr>";

        while ($row = $result->fetch_assoc()) {
            // Formate a data conforme necessário
            $data_formatada = date("d/m/Y", strtotime($row['data_limite_entrega']));
            echo "<tr>";
            echo "<td>{$data_formatada}</td>";
            echo "<td>{$row['horario_limite_entrega']}</td>";
            echo "<td>R$ {$row['preco_entrega']}</td>";
            echo "</tr>";

            // Informações adicionais
            echo "<tr style='font-size: 15px;'>";
            echo "<td>Saída: {$row['local_saida_carga']}</td>";
            echo "<td>Destino: {$row['local_destino_entrega']}</td>";
            
            // Adicionei o número de telefone da tabela frete no link do WhatsApp
            echo "<td><a href='https://wa.me/{$row['telefonecam']}'><img src='Imagens/whatsapp.png' alt='#'></a></td>";
            
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhuma corrida encontrada para o contratante logado.</p>";
    }

    // Feche a declaração preparada
    $stmt->close();
    ?>
    <!-- Fim da verificação do id_cont -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>