<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$_SESSION['hora_final'] = $_POST['hora_final'];
date_default_timezone_set('America/Sao_Paulo');

$inserir = New Registro($conexao);
$insere_registro = $inserir->inserirRegistros($_SESSION['id'], $_SESSION['id_projeto'], $_SESSION['hora_inicio'], $_SESSION['hora_final']);


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
		<p>
			<h1>Registro de Horas Trabalhadas</h1>
		</p>
		<p>
			Caro colaborador <?php echo $_SESSION['nome'] ?>
		</p>

	</body>
</html>
