<?php
include("adm/conexao.php");

session_start();

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['idContratante'];

$sql = "SELECT * FROM contratante WHERE idContratante = '$userId'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil - Carga Fácil</title>
    <link rel="stylesheet" href="perfil_cam.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header style="margin-bottom: 10px;">
        <a href="primeiratelacont.html"><button><img src="Imagens/voltar-fotor-20230628161115.png" alt="#"></button></a>
        <p>Perfil</p>
    </header>

    <div class="profile-image" style="margin-left: 40px; margin-bottom: 20px;">
        <img src="Imagens/perfilpadrao.png" alt="Imagem de Perfil">
        <a href="#" class="change-image-link">Clique para trocar a imagem de perfil</a>
    </div>

    <table style="border-collapse: separate; margin-top: 15px; padding-left: 40px;">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='font-size: 13px;'><strong>Nome completo:</strong></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Nome"] . "</td>";
                echo "<td style='color: #4E569D;'>&#11166;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold;'>Telefone de contato:</td>";
                echo "</tr>";
                echo "<tr></tr>";
                echo "<td style='color: #4E569D;'>" . $row["telefone"] . "</td>";
                echo "<td style='color: #4E569D;'>&#11166;</td>";

                // Verifica se o telefone está verificado
                if ($row["telefone"]) {
                    // ...
                } else {
                    echo "<td style='color: red; font-size: 10px;'><a href='cadascellcont.html' style='color: red;'>Não verificado, clique para verificar</a></td>";
                }

                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold;'>Alterar e-mail:</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Email"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold;'>Alterar senha:</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Senha"] . "</td>";
                echo "<td style='color: #4E569D;'>&#9673;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold;'>Informações para verificação:</td>";
                echo "<td style='color: red; font-size: 10px;'>Obrigatório a verificação para corridas</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold;'>Clique para adicionar:</td>";
                echo "<td style='font-weight: bold;'><a href='verificacao_cont.html' style='color: red;'>&#11166;</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
        }
        ?>
    </table>

    <div class="center-container">
        <a href="excluirc.html">
            <button class="center-button">Excluir conta</button>
        </a>

    <script>
        function mostrarSenha() {
            var senhaInput = document.getElementById('senha');
            var mostrarSenhaCheckbox = document.getElementById('mostrarSenha');

            if (mostrarSenhaCheckbox.checked) {
                senhaInput.type = 'text';
            } else {
                senhaInput.type = 'password';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
