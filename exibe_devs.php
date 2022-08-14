<?php

session_start();

require 'conexao.php';
require 'src/registro.php';

$desenvolvedor = New Registro($conexao);
$devs = $desenvolvedor-> getDev();

foreach($devs as $dev){

echo  $dev['id'];
echo  $dev['nome'];
echo  $dev['usuario'];
echo  $dev['senha'];

}

?>


<select name="dev">

	<?php foreach($devs as $dev): ?>
		<option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['nome_dev'];  ?></option>

	<?php endforeach; ?>
	
</select>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Desenvolvedores</title>
</head>
<body>

</body>
</html>