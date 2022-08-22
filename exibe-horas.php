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
	<title>Banco de Horas</title>
</head>
	<body>
		<div id="container">
				<h1>Registro de Horas Trabalhadas</h1>		
		</div>
		<div id ="container">
			<div id="sair">
				<a href="logout.php"><button>Sair</button></a>
			</div>
			
			<h2>Colaborador <?php echo $_SESSION['nome']; ?> você gostaria de verificar a quantidade de horas trabalhadas em qual projeto?</h2>

				<?php foreach($projeto_dev as $projeto): ?>
		
					<p>
						<a href ="pag_exibicao.php?id=<?php echo $projeto['id']; ?>"><button class="botao"><?php echo $projeto['nome_projeto'];  ?></button></a>
					</p>

				<?php endforeach; ?>

				<a href="entrada.php"><button>Voltar</button></a>
		</div>
	</body>
</html>