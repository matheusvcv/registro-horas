<?php

require 'conexao.php';

	class Registro
	{
		private $projeto;

		private $data;

		private $hora_inicio;

		private $hora_final;

		private $conexao;

			public function __construct(mysqli $conexao)
			{
				$this->conexao = $conexao;
			}

			public function getDev(): array
			{
				$getDev = $this->conexao->query("SELECT * FROM desenvolvedor");

				$devs = $getDev->fetch_all(MYSQLI_ASSOC); 

				return $devs;
			}

			public function getProjeto(): array
			{
				$getProjeto = $this->conexao->query("SELECT * FROM projeto");

				$projetos = $getProjeto->fetch_all(MYSQLI_ASSOC); 

				return $projetos;
			}

			public function inserirRegistros(string $projeto, string $data, string $hora_inicio, string $hora_final): void
			{
				$inserir = $this->conexao->prepare("INSERT INTO prejetos(projeto, data, hora_inicio, hora_final) VALUES (?,?,?,?)");

				$inserir->bind_param('ssss', $projeto, $data, $hora_inicio, $hora_final);

				$inserir->execute();
			}




	}