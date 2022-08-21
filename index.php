<?php

require "conexao.php";

if(isset($_POST['usuario']) || isset($_POST['senha'])){

	if(strlen($_POST['usuario']) == 0){

		echo "Por favor, preencha corretamente o campo referente ao seu nome de usuário!";

	}else if (strlen($_POST['senha']) == 0){
		
		echo "Por favor, preencha corretamente o campo referente a sua senha.";
	}else{

		$usuario = $conexao->real_escape_string($_POST['usuario']);
		$senha = $conexao->real_escape_string($_POST['senha']);

		$codigo_consulta = "SELECT * FROM desenvolvedor WHERE usuario = '$usuario' AND senha = '$senha'";
		$sql_consulta = $conexao->query($codigo_consulta) or die("Não foi possível realizar a conexão com o banco de dados.");

		$quantidade = $sql_consulta->num_rows;

		if($quantidade === 1){

			$desenvolvedor = $sql_consulta-> fetch_assoc();

			if(!isset($_SESSION)){

				session_start();
			}

			$_SESSION['id'] = $desenvolvedor['id'];
			$_SESSION['nome'] = $desenvolvedor['nome'];

			header('Location: entrada.php');
		}else {

			echo "Falha na tentativa de Login. E-mail ou Senha incorretos.";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br><div id="logo">
		<img src="img/clock.png">		
	</div><br>
	<div id="login">
		<h1>Login Registro de Horas Trabalhadas</h1>
	</div>
	<div id="login">
	<form action="" method="POST">
		<br><p>
			Digite seu nome de usuário: <input type="text" name="usuario" placeholder="user name">
		</p>
		<p>
			Digite sua senha: <input type="password" name="senha" placeholder="senha">
		</p><br>
		<p>
			<input type="submit" value="Entrar">
		</p>
	</form>
	</div><br>
</body>
</html>