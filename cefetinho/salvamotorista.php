<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idMotorista = isset($_POST['idmotorista']) ? $_POST['idmotorista'] : '';
    $Nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $CPF = isset($_POST['cpf']) ? $_POST['cpf'] : ''; 
    $Email = isset($_POST['email']) ? $_POST['email'] : '';
    $Senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $ConfSenha = isset($_POST['confsenha']) ? $_POST['confsenha'] : '';
    
    $sql = "INSERT INTO motorista (idmotorista, nome, cpf, email, senha, confsenha) 
    VALUES ('$idMotorista', '$Nome', '$CPF', '$Email', '$Senha', '$ConfSenha')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Cadastrado com Sucesso!');window.location='1tela.html'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao 1tela.html
        mysqli_close($con); 	//Fechando a conexão, é muito importante que ela seja fechada!!!!
    }
    else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);
    }

?>