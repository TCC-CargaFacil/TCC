<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Frete</title>
    <link rel="stylesheet" href="aceitarcorrida.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="primeiratela.html"><button><img src="Imagens/voltar-fotor-20230628161115.png" alt="#"></button></a>
        <p>Detalhes do Frete</p>
    </header>

    <?php
    include("adm/conexao.php");

    // Verifique se o ID do frete está presente na URL
    if (isset($_GET['id'])) {
        $idFrete = $_GET['id'];

        // Consulta para obter informações do frete com base no ID
        $sql = "SELECT * FROM frete WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $idFrete);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifique se há resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Preencha as informações na tabela
            echo "<table>";
            echo "<tr><td>Até</td><td>{$row['data_limite_entrega']}</td><td>{$row['horario_limite_entrega']}</td></tr>";
            echo "<tr><td style='padding-top: 30px;'>Saída:</td><td style='padding-top: 30px;'>{$row['local_saida_carga']}</td></tr>";
            echo "<tr><td>Responsável:</td><td>{$row['nome_responsavel_envio']}</td></tr>";
            echo "<tr><td style='text-align: center;'>____________</td><td style='text-align: center;'>____________</td></tr>";
            echo "<tr><td>Destino:</td><td>{$row['local_destino_entrega']}</td></tr>";
            echo "<tr><td>Responsável:</td><td>{$row['nome_responsavel_admissao']}</td></tr>";
            echo "<tr><td style='text-align: center;'>____________</td><td style='text-align: center;'>____________</td></tr>";
            echo "<tr><td>Total de pagamento:</td><td> R$ {$row['preco_entrega']}</td></tr>";
            echo "<tr><td>Tipo de carga:</td><td>{$row['tipo_carga']}</td></tr>";
            echo "<tr><td><button style='border-radius: 30px; background-color: #4E569D; margin-top: 30px; text-align: center;'>Enviar mensagem</button></td>";
            echo "<td><button style='border-radius: 30px; background-color: white; margin-top: 30px; text-align: center;'>Aceitar Corrida</button></td></tr>";
            echo "</table>";
        } else {
            echo "<p>Nenhum resultado encontrado para o ID do frete.</p>";
        }

        // Feche a declaração preparada
        $stmt->close();
    } else {
        echo "<p>ID do frete não fornecido.</p>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
