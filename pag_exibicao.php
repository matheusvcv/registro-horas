<?php 
require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$registro = New Registro($conexao);
$projetos = $registro-> getRegistroPorProjeto($_SESSION['id'], $_GET['id']);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<title>Banco de Horas</title>
</head>
<body>
	<?php foreach($projetos as $projeto): ?>
	<p>
		<strong>Hora de início: </strong><?php echo $projeto['hora_inicio'];?>
	</p>
	<p>
		<strong>Hora de Finalização: </strong><?php echo $projeto['hora_final'];?>
	</p>
	<p>
		<strong>Horas Trabalhadas: </strong><?php echo $projeto['horas_trabalhadas']; ?>
	</p><br>
	<?php endforeach; ?>

	<a href="entrada.php"><button>Voltar</button></a>

</body>
</html>