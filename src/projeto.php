<?php

require 'conexao.php';

	class Projeto
	{
		private $projeto;

		public function __construct(mysqli $conexao)
		{
			$this->conexao = $conexao;
		}

		public function setProjeto(string $projeto_nome)
		{
			$this->conexao->query("CREATE TABLE $projeto_nome");
		}
	}