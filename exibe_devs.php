<?php

session_start();

require 'conexao.php';
require 'src/registro.php';

$desenvolvedor = New Registro($conexao);
$devs = $desenvolvedor-> getDev();

foreach($devs as $dev): ?>
<p>
<?php echo  $dev['nome'];  ?><br>
<?php echo  $dev['usuario']; ?><br>
<?php echo  $dev['senha']; ?><br>
</p>



<?php endforeach; ?>


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