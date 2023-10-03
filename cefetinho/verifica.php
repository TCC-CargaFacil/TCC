<?php session_start();

require("adm/conexao.php");

	if(isset($_POST["email"])){
    	$Email = $_POST["email"];
    	$Senha = $_POST["senha"];
    }
	$sql = "SELECT * FROM motorista WHERE email='".$Email."' AND senha='".$Senha."'";

  	$selecionado = mysqli_query($con, $sql);

  	if($dados = mysqli_fetch_assoc($selecionado)){
      
      	$perfilBanco = $dados["Perfil"];
  		if ($perfilBanco == 0){
              $_SESSION['id'] = $dados['idMotorista'];
              $_SESSION['perfil'] = $dados['Perfil'];
              $_SESSION['logado'] = true;
  			header("Location: primeiratela.html");
          }
    	else{
  			header("Location: login.html");
        }
  	}
  	else if(isset($_POST["email"])){
        $Email = $_POST["email"];
    	$Senha = $_POST["senha"];
  	}
      $sql = "SELECT * FROM contratante WHERE email='".$Email."' AND senha='".$Senha."'";

  	$selecionado = mysqli_query($con, $sql);

  	if($dados = mysqli_fetch_assoc($selecionado)){
      
      	$perfilBanco = $dados["Perfil"];
  		if ($perfilBanco == 1){
              $_SESSION['id'] = $dados['idContratante'];
              $_SESSION['perfil'] = $dados['Perfil'];
              $_SESSION['logado'] = true;
  			header("Location: pagamentos.html"); //colocar a pagina de destino do contratante
          }
    	else{
  			header("Location: login.html");
        }
  	}
      else{
          echo "<script>alert('Usuário Inválido, tente novamente!');window.location='loginpage.php'</script>";
      }


?>