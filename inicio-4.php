<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

date_default_timezone_set('America/Sao_Paulo');

$registro = New Registro($conexao);
$exibe_registro = $registro->getRegistros();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<title>Desenvolvedores</title>
</head>
	<body>
		<p>
			<a href="logout.php">Sair</a>
		</p>

		<?php foreach($exibe_registro as $registro): ?>
				
			<p>
				<strong>ID Registro:</strong><?php  echo $registro['id']; ?><br>

				<strong>ID Projeto:</strong> <?php  echo $registro['id_projeto']; ?><br>

				<strong>Horário início:</strong> <?php echo $registro['hora_inicio']; ?><br>

				<strong>Horário final:</strong> <?php echo $registro['hora_final']; ?><br>

				<br><a href="registro.php?id=<?php echo $registro_ind['id']; ?>"><button>Verificar</button></a>

			</p>
		<?php endforeach; ?>
	</body>
</html>