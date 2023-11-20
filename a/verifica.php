<?php
session_start();
require("adm/conexao.php");

if (isset($_POST["email"])) {
    $Email = $_POST["email"];
    $Senha = $_POST["senha"];

    // Consulta SQL para buscar informações do motorista
    $sql = "SELECT * FROM motorista WHERE email='".$Email."' AND senha='".$Senha."'";
    $selecionado = mysqli_query($con, $sql);

    if ($dados = mysqli_fetch_assoc($selecionado)) {
        $_SESSION['idMotorista'] = $dados['idMotorista'];
        $_SESSION['perfil'] = $dados['Perfil'];
        $_SESSION['logado'] = true;

        if ($dados['Perfil'] == 0) {
            header("Location: primeiratela.php");
        } else {
            header("Location: 1tela.html");
        }
        exit(); // Importante para evitar a execução do código abaixo
    } else {
        // Se não encontrou no motorista, tenta buscar no contratante
        $sql = "SELECT * FROM contratante WHERE email='".$Email."' AND senha='".$Senha."'";
        $selecionado = mysqli_query($con, $sql);

        if ($dados = mysqli_fetch_assoc($selecionado)) {
            $_SESSION['idContratante'] = $dados['idContratante'];
            $_SESSION['perfil'] = $dados['Perfil'];
            $_SESSION['logado'] = true;

            if ($dados['Perfil'] == 1) {
                header("Location: primeiratelacont.html");
            } else {
                header("Location: login.html");
            }
            exit();
        } else {
            echo "<script>alert('Usuário Inválido, tente novamente!');window.location='login.html'</script>";
        }
    }
} else {
    // Se o formulário não foi enviado corretamente, redirecione para a página de login
    header("Location: login.html");
    exit();
}
?>
