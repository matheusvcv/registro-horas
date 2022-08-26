<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$_SESSION['data'] = $_POST['data'];
$_SESSION['hora_inicio'] = $_POST['hora_inicio'];
$_SESSION['id_projeto'] = $_POST['projeto'];

date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" width="device-width initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Desenvolvedores</title>
	</head>
	<body>
		<div id="container">
			<div id="sair">
				<a href="logout.php"><button id="button">Sair</button></a>
			</div>
			<h1>Verificação Iniciada</h1>
		</div>
		<div id="container1">
			<form method="POST" action="registro-2.php">
				<p>
					<img src="img/clock.gif">
				</p>
				<p>
					Registro de horas trabalhadas iniciado. Assim que concluir, informe abaixo o horário de conclusão e aperte no botão "Enviar"!
				</p>
				<p>
					<strong>Horário de Finalização:</strong> <input type="time" name="hora_final">
				</p>
				<input type="submit" value="Enviar">

			</form>
		</div>
	</body>
</html>