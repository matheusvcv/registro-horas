<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$projetos = New Registro($conexao);
$projeto_dev = $projetos->getProjeto();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/clock.png">
	<title>Banco de Horas</title>
</head>
	<body>
		<div id="container">
			<div id="sair">
				<a href="logout.php"><button id="button">Sair</button></a>
			</div>
			<h1>Registro de Horas Trabalhadas</h1>		
		</div>
		<div id ="container">
			<p>Colaborador <strong><?php echo $_SESSION['nome']; ?></strong> você gostaria de verificar a quantidade de horas trabalhadas em qual projeto?</p><br>

				<?php foreach($projeto_dev as $projeto): ?>
		
					<p>
						<a href ="pag_exibicao.php?id=<?php echo $projeto['id']; ?>"><button class="botao"><?php echo $projeto['nome_projeto'];  ?></button></a>
					</p>

				<?php endforeach; ?>

				<br><a href="entrada.php"><button>Voltar</button></a>
		</div>
	</body>
</html>