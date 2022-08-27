<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

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
		<title>Deletar Projetos</title>
	</head>
	<body>
		<div id="container">
			<h1>Deletar Projetos</h1>
		</div>
		<div id="container">
			<img src="img/delete1.png">
			<br><p class="justificado">
					Segue abaixo a lista dos projetos cadastrados. Você pode deletar qualquer um deles, uma vez que tenha concluído ou abandonado o projeto. No entanto, tenha em mente que caso o faça, você não poderar reaver os registros novamente. Um vez que os registros tenham sido apagados, eles não poderão ser recuperados.
			</p><br>
			<?php foreach($projetos as $projeto): ?>
			<div id="faixa1">
				Projeto
			</div>
			<div id="bloco">
				<p>
					<strong>Nome:</strong><?php echo $projeto['nome_projeto']; ?>
				</p>
				<p>
					<strong>ID: </strong><?php echo $projeto['id']; ?>
				</p>
			</div>
			<div id="faixa1">
				<a href="deletar.php?id=<?php echo $projeto['id']; ?>"><button>Deletar</button></a>
			</div><br>
			<?php endforeach; ?>
			<a href="entrada.php"><button id="button">Voltar</button></a><br>
		</div>
	</body>
</html>