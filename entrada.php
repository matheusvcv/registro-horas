<?php

require "protect.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Horas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
	<div id="sair">
		<button><a href="logout.php">Sair</a></button>
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

	</div>

</body>
</html>