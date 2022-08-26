<?php

require "protect.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
	<title>Registro de Horas</title>
</head>
<body>
	<div id="container">
	<div id="sair">
		<a href="logout.php"><button id="button">Sair</button></a>
	</div>
		<h1>Registro de Horas trabalhadas</h1>
	</div>
	<div id="container">
	<div id="logo">
		<img src="img/code.png">
	</div><br>
	<p>
		Olá, <strong><?php echo $_SESSION['nome']; ?></strong>! O que você gostaria de fazer?
	</p><br>
	<a href="registro.php"><button class="botao">Iniciar Trabalhos</button></a>

	<a href="exibe-horas.php"><button class="botao">Verificar Registros</button></a>

	<a href="inserir-projetos.php"><button class="botao">Inserir Novo Projeto</button></a>

	</div>

</body>
</html>