
<?php
require "conexao.php";
require "src/registro.php";

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$inserir_registros = New Registro($conexao);
		$inserir = $inserir_registros->inserirRegistros($_POST['projeto'], $_POST['data'], $_POST['hora_inicio'], $_POST['hora_final']);
	}


	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<p>
			Nome do Projeto: <input type="text" name="projeto">
		</p>
		<p>
			Data da Contribuição: <input type="date" name="data">
		</p>
		<p>
			Marque o horário em que está entrando: <input type="time" name="hora_inicio">
		</p>
		<p>
			Marque o horário em que está saindo: <input type="time" name="hora_final">
		</p>
		<input type="submit" value="enviar">
</body>
</html>