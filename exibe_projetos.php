<?php

session_start();

require 'conexao.php';
require 'src/registro.php';

$getProjetos = New Registro($conexao);
$projetos = $getProjetos-> getProjeto();

foreach($projetos as $projeto){

$_SESSION['id_projeto'] = $projeto['id'];
$_SESSION['nome_projeto'] = $projeto['nome_projeto'];

}

echo $_SESSION['id_projeto'];
echo $_SESSION['nome_projeto'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projetos</title>
</head>
<body>

</body>
</html>