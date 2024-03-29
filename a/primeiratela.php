<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicial - Carga Fácil</title>
    <link rel="stylesheet" href="primeiratela.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-inverse" style="background-color: #131527; border-color: #000; color: white;">
        <div class="container">
            <a class="navbar-brand" href="#">Carga Fácil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="mostraperfcam.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="corridas.php">Corridas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagamentos.php">Pagamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracoes.html">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="seguranca.html">Segurança</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajuda.html">Ajuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <iframe src="mapa.html" frameborder="0" height="630px" width="100%" style="display: flex; margin: 0px; padding: 0px;"></iframe>

    <div id="footer">
        <div id="expand-button">
            <button onclick="toggleExpansion()" style="background-color: transparent; border: none;"><img height="40px" width="70px" style="background-color: transparent;" src="Imagens/setacima.png" alt="#"></button>
        </div>
        <div id="content">
            <div class="search-container">
                <input type="search" class="procure" placeholder="Pesquisar">
            </div>
            <table class="table" id="a">
                <thead>
                    <tr>
                        <th>Nome do Cadastro</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("adm/conexao.php");

                    // Consulta para obter informações da tabela frete
                    $sql = "SELECT * FROM frete WHERE id_mot IS NULL";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nome_responsavel_envio'] . "</td>";
                            echo "<td><a href='aceitarcorrida.php?id=" . $row['id'] . "'>Aceitar Corrida</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>Nenhum frete disponível.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="primeiratela.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
