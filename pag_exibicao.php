<?php 
require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$registro = New Registro($conexao);
$projetos = $registro-> getRegistroPorProjeto($_SESSION['id'], $_GET['id']);

$projetoInd = $registro-> getProjetoInd($_GET['id']);

$resultado = $registro-> getHoras($_SESSION['id'], $_GET['id']);


	function segundo_em_tempo($segundos){

		$horas = floor($segundos/3600);

		$minutos = floor($segundos % 3600/60);

		$segundos = $segundos % 60;

		return sprintf("%d:%02d:%02d", $horas, $minutos, $segundos);
	}

	while($row = $resultado-> fetch_array(MYSQLI_NUM)){

		$arr[] = $row[0];

	} 

	$soma = 0;

		foreach($arr as $hora){

			list($horas, $minutos, $segundos) = explode(':', $hora);

			$calc = $horas * 3600 + $minutos * 60 + $segundos;

			$soma = $soma + $calc;
		}

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
		<h1>Relatório de Tempo investido:</h1>
	</div>
	<div id="container">
		<h3>Total de tempo investido: <mark><?php echo segundo_em_tempo($soma); ?></mark></h3>
		<p class="justificado">
			Caro colaborador <strong><?php echo $_SESSION['nome']; ?></strong> o total de tempo investido no projeto  <strong><?php foreach($projetoInd as $ind){echo $ind['nome_projeto'];} ?></strong> foi <strong><?php echo segundo_em_tempo($soma); ?></strong>. Segue abaixo o relatório das suas contribuições no projeto:
		</p><br>

		<p></strong></p>

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

		<a href="entrada.php"><button>Voltar</button></a><br>

	</div><br>
</body>
</html>