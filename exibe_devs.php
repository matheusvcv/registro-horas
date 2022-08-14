<?php

session_start();

require 'conexao.php';
require 'src/registro.php';

$desenvolvedor = New Registro($conexao);
$devs = $desenvolvedor-> getDev();

$getProjetos = New Registro($conexao);
$projetos = $getProjetos-> getProjeto();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<title>Desenvolvedores</title>
</head>
<body>
	<form method="POST" action="">
		<p>Escolha um usuário:
		<select name="dev">
			<option value="indefinido">Escolha uma Opção: </option>
			<?php foreach($devs as $dev): ?>
				<option value="<?php echo $dev['id']; ?>"><?php echo $dev['nome']; ?></option><br>
			<?php endforeach; ?>
		</select>
		</p>
		<p>Escolha um Projeto:
		<select name="projeto">
			<option value="indefinido">Escolha uma Opção: </option>
			<?php foreach($projetos as $projeto): ?>
				<option value="<?php echo $projeto['id']; ?>"><?php echo $projeto['nome_projeto']; ?></option>
			<?php endforeach; ?>
		</select>
		</p>
		<p>
			<input type="submit" value="Enviar">
		</p>
	</form>
</body>
</html>