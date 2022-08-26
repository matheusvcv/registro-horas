<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$_SESSION['hora_final'] = $_POST['hora_final'];

date_default_timezone_set('America/Sao_Paulo');

$registro = New Registro($conexao);
$insere_registro = $registro->inserirRegistros($_SESSION['id'], $_SESSION['id_projeto'], $_SESSION['data'], $_SESSION['hora_inicio'], $_SESSION['hora_final']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
	<title>Desenvolvedores</title>
</head>
	<body>
		<div id="container">
		<div id="sair">
			<a href="logout.php"><button id="button">Sair</button></a>
		</div>
			<h1>Registro de Horas Trabalhadas</h1>
		</div>
		<div id="container">
			<p>
				Caro colaborador <strong><?php echo $_SESSION['nome']?></strong> o seu registro foi inserido com sucesso!
			</p>
			<p>
				Para verificar <a href="registro-3.php"><button>Clique aqui</button></a>
			</p>
		</div>

	</body>
</html>
