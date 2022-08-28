<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$deletarProjeto = New Registro($conexao);
	$deletar = $deletarProjeto->deletaProjeto($_GET['id']);

	header("Location: deletar-projeto.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" width="device-width initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
		<title>Deletar Projetos</title>
	</head>
	<body>
		<div id="container">
			<h1>Você tem certeza que deseja apagar esse projeto?</h1>
			<p>Obs: Os registros de projetos apagados não poderão ser recuperados!</p>

			<form method="POST" action="">

				<input type="submit" value="Deletar"><br>
			</form>
			<br><a href="entrada.php"><button id="button">Voltar</button></a><br>
		</div>
	</body>
</html>