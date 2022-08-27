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
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
		<title>Desenvolvedores</title>
	</head>
	<body>
		<div id="container">
			<div id="sair">
				<a href="logout.php"><button id="button">Sair</button></a>
			</div>
			<h1>Registro de Horário de Início de Trabalho</h1>
		</div>
		<div id="container">
			<p>
				Caro colaborador <strong><?php echo $_SESSION['nome']; ?></strong>, preencha os campos abaixo com a data de hoje, o projeto no qual vai trabalhar e o horário exato em que está começando:
			</p><br>
			<form method="POST" action="registro-1.php">
				<p>
				<strong>Desenvolvedor:</strong> <input type="text" name="dev" value="<?php echo $_SESSION['nome']; ?>" disabled>
				</p>
				<strong>Digite a data de hoje:</strong> <input type="date" name="data">
				<strong><p>Escolha um Projeto:</strong>
				<select name="projeto">
					<option value="indefinido">Escolha uma Opção: </option>
					<?php foreach($projetos as $projeto): ?>
						<option value="<?php echo $projeto['id']; ?>"><?php echo $projeto['nome_projeto']; ?></option>
					<?php endforeach; ?>
				</select>
				</p>
				<p>
					Caso seu projeto ainda não esteja cadastrado, cadastreo <a href="inserir-projetos.php">clicando aqui.</a>
				</p>
				<p>
					<strong>Horário de Início:</strong> <input type="time" name="hora_inicio" value="<?php echo $atual; ?>">
				</p>
				<input type="hidden" name="id_desenvolvedor" value="<?php echo $_SESSION['id']; ?>">
				<input type="hidden" name="nome" value="<?php echo $_SESSION['nome']; ?>">

				<p>
					<input type="submit" value="Enviar">
				</p>
			</form>
		</div>
	</body>
</html>