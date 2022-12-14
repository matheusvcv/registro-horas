<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

date_default_timezone_set('America/Sao_Paulo');

$registro = New Registro($conexao);

$projetoInd = $registro->getProjetoInd($_SESSION['id_projeto']);

	foreach($projetoInd as $projeto){

		$_SESSION['nome_do_projeto'] = $projeto['nome_projeto'];
	}

$exibe_registro = $registro->getRegistros();

foreach($exibe_registro as $registros){

$_SESSION['id_registro'] = $registros['id'];

$_SESSION['id_projeto'] =  $registros['id_projeto']; 

$_SESSION['hora_inicio'] =  $registros['hora_inicio']; 

$_SESSION['hora_final'] =  $registros['hora_final']; 

}

$inicio = $registros['hora_inicio'];
$final = $registros['hora_final']; 

$inicio = DateTime::createFromFormat('H:i:s', $inicio);
$final = DateTime::createFromFormat('H:i:s', $final);

$intervalo = $inicio->diff($final);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$insereHora = New Registro($conexao);
	$insere = $insereHora-> atualizaHoras($_POST['horas_trabalhadas'], $_SESSION['id_registro']);

	header('Location: entrada.php');
}

		
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
			<h1>Registro Atual</h1>
		</div>
		<div id="container">
			<p>
				<strong>Data: </strong><?php $usoData = strtotime($registros['data']); echo date('d/m/y', $usoData); ?>
			</p>
			<p>
				<strong>Hora de início: </strong><?php echo $registros['hora_inicio']; ?>
			</p>
			<p>
				<strong>Hora Finalização: </strong><?php echo $registros['hora_final']; ?>
			</p>
			<p>
				<strong>Total trabalhado hoje: </strong><?php echo $intervalo->format('%H:%I:%S');?>
			</p>
			<form action="" method="POST">
				<input type="hidden" name="horas_trabalhadas" value="<?php echo $intervalo->format('%H:%I:%S'); ?>">

				<input type="submit" value="Registrar">
			</form>
		</div>
	</body>
</html>