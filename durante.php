<?php

require 'conexao.php';
require 'src/registro.php';
require 'protect.php';

$horarios = New Registro($conexao);
$hora = $horarios-> getHoras(4);


$inicio = $hora['hora_inicio'];

$final = $hora['hora_final'];

echo $final . "<br>";

$inicio = DateTime::createFromFormat('H:i:s', $inicio);

$final = DateTime::createFromFormat('H:i:s', $final);

$intervalo = $inicio->diff($final);

echo $intervalo->format('%H:%I:%S');

$alt_intervalo = $intervalo->format('%H:%I:%S');







