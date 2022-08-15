<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$_SESSION['hora_inicio'] = $_POST['hora_inicio'];
$_SESSION['id_projeto'] = $_POST['projeto'];


date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" width="device-width initial-scale=1.0">
		<title>Desenvolvedores</title>
	</head>
	<body>
		<a href="logout.php">Sair</a>
		<form method="POST" action="inicio-3.php">
			<p>
				Registro de horas trabalhadas iniciado. Assim que concluir, informe abaixo o horário de conclusão e aperte no botão "Enviar"!
			</p>
			<p>
				Data Final: <input type="time" name="hora_final">
			</p>
			<input type="submit" value="Enviar">

		</form>
	</body>
</html>