<?php

$conexao = New mysqli('localhost','root','','registro_de_horas');

	$conexao-> set_charset('utf8');

	if($conexao == FALSE){

			echo "Falha na conexão.";
	}