<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$horas = New Registro($conexao);
$horas_dev = $horas->getRegistros($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<title>Banco de Horas</title>
</head>
	<body>
		<a href="logout.php">Sair</a>
		<h1>Registro de Horas Trabalhadas</h1>

		<h2>Colaborador <?php echo $_SESSION['nome']; ?></h2>


			<?php foreach($horas_dev as $dev): ?>

				<p>
					<strong>Horas Trabalhadas:</strong> <?php echo $dev['horas_trabalhadas']; ?>
				</p>

			<?php endforeach; ?>
	</body>
</html>