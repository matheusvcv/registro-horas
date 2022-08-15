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

			public function getRegistros(): array
			{
				$getRegistros = $this->conexao->query("SELECT * FROM registros");

				$reg = $getRegistros->fetch_all(MYSQLI_ASSOC); 

				return $reg;
			}

			public function getProjeto(): array
			{
				$getProjeto = $this->conexao->query("SELECT * FROM projeto");

				$projetos = $getProjeto->fetch_all(MYSQLI_ASSOC); 

				return $projetos;
			}

			public function inserirRegistros(string $id_desenvolvedor, string $id_projeto, string $hora_inicio, string $hora_final): void
			{
				$inserir = $this->conexao->prepare("INSERT INTO registros(id_desenvolvedor, id_projeto, hora_inicio, hora_final) VALUES (?,?,?,?)");

				$inserir->bind_param('ssss', $id_desenvolvedor, $id_projeto, $hora_inicio, $hora_final);

				$inserir->execute();

			}

			public function getHoras(int $id): array
			{
				$queryHorarios = $this->conexao->prepare("SELECT hora_inicio, hora_final, horas_trabalhadas FROM registros WHERE id = ?");

				$queryHorarios-> bind_param('i', $id);

				$queryHorarios-> execute();

				$horarios = $queryHorarios->get_result()->fetch_assoc();

				return $horarios;

			}
			
			public function getRegistro(int $id): array
			{
				$queryRegistro = $this->conexao->prepare("SELECT * FROM registros WHERE id = ?");

				$queryRegistro-> bind_param('i', $id);

				$queryRegistro-> execute();

				$registro = $queryRegistro->get_result()->fetch_assoc();

				return $registro;

			}




	}