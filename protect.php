<?php

if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['id'])){
	
	die("Você não pode acessar a página pois não está logado.<p><a href='index.php'>Clique aqui</a> para ser redirecionado para página de login.</p>");

	}
?>	

