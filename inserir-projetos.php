<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$insereProjeto = new Registro($conexao);

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$inserir = $insereProjeto->insereProjeto($_POST['nome_projeto']);

		header('Location: entrada.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
	<title>Inserir Novo Projeto</title>
</head>
<body>
	<div id="container">
		<h1>Inserir Projeto</h1>
	</div>
	<div id="container">
		<form method="POST" action="">
			<img src="img/project.png"><br>
			<br><p>
				<strong>Nome do novo Projeto:</strong> <input type="text" name="nome_projeto">
			</p>
			<p>
				<input type="submit" value="Cadastrar">
			</p>
		</form>
	</div>
</body>
</html>