<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

date_default_timezone_set('America/Sao_Paulo');

$getProjetos = New Registro($conexao);
$projetos = $getProjetos-> getProjeto();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" width="device-width initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
		<title>Desenvolvedores</title>
	</head>
	<body>
		<a href="logout.php">Sair</a>
		<form method="POST" action="registro-1.php">
			<p>
			Desenvolvedor: <input type="text" name="dev" value="<?php echo $_SESSION['nome']; ?>" disabled>
			</p>
			Digite a data de hoje: <input type="date" name="data">
			<p>Escolha um Projeto:
			<select name="projeto">
				<option value="indefinido">Escolha uma Opção: </option>
				<?php foreach($projetos as $projeto): ?>
					<option value="<?php echo $projeto['id']; ?>"><?php echo $projeto['nome_projeto']; ?></option>
				<?php endforeach; ?>
			</select>
			</p>
			<p>
				Horário de Início: <input type="time" name="hora_inicio" value="<?php echo $atual; ?>">
			</p>
			<input type="hidden" name="id_desenvolvedor" value="<?php echo $_SESSION['id']; ?>">
			<input type="hidden" name="nome" value="<?php echo $_SESSION['nome']; ?>">

			<p>
				<input type="submit" value="Enviar">
			</p>
		</form>
	</body>
</html>