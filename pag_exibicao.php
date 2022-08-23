<?php 
require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$registro = New Registro($conexao);
$projetos = $registro-> getRegistroPorProjeto($_SESSION['id'], $_GET['id']);

$projetoInd = $registro-> getProjetoInd($_GET['id']);

$horas = $registro-> getHoras($_SESSION['id'], $_GET['id']);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Banco de Horas</title>
</head>
<body>
	<div id="container">
		<p>
			Caro colaborador <strong><?php echo $_SESSION['nome']; ?></strong> segue abaixo o relatório das suas contribuições no projeto <strong><?php foreach($projetoInd as $ind){echo $ind['nome_projeto'];} ?></strong>:
		</p><br>

		<?php foreach($projetos as $projeto): ?>

			<br><div id="faixa"><strong>
				<?php
					$usoData = strtotime($projeto['data']); 
					echo date('d/m/y', $usoData);

				?></strong>
			</div>

			<div id="bloco" align="center">
				<p>
					<strong>Hora de início: </strong><?php echo $projeto['hora_inicio'];?>
				</p>
				<p>
					<strong>Hora de Finalização: </strong><?php echo $projeto['hora_final'];?>
				</p>
				<p>
					<strong>Horas Trabalhadas: </strong><?php echo $projeto['horas_trabalhadas']; ?>
				</p>
			</div><br>

			<?php endforeach; ?>

		<a href="entrada.php"><button>Voltar</button></a>

	</div><br>
</body>
</html>