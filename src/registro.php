<?php

require 'conexao.php';

	class Registro
	{

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

			public function getProjetoInd(int $id): array
			{
				$getProjeto = $this->conexao->query("SELECT * FROM projeto WHERE id = $id");

				$projetos = $getProjeto->fetch_all(MYSQLI_ASSOC); 

				return $projetos;
			}

			public function inserirRegistros(string $id_desenvolvedor, string $id_projeto, string $data, string $hora_inicio, string $hora_final): void
			{
				$inserir = $this->conexao->prepare("INSERT INTO registros(id_desenvolvedor, id_projeto, data, hora_inicio, hora_final) VALUES (?,?,?,?,?)");

				$inserir->bind_param('sssss', $id_desenvolvedor, $id_projeto, $data, $hora_inicio, $hora_final);

				$inserir->execute();

			}

			public function insereProjeto(string $nome_projeto)
			{
				$inserir = $this->conexao->prepare("INSERT INTO projeto(nome_projeto) VALUES(?)");

				$inserir->bind_param('s', $nome_projeto);

				$inserir-> execute();
			}

			
			public function getRegistro(int $id): array
			{
				$queryRegistro = $this->conexao->prepare("SELECT * FROM registros WHERE id = ?");

				$queryRegistro-> bind_param('i', $id);

				$queryRegistro-> execute();

				$registro = $queryRegistro->get_result()->fetch_assoc();

				return $registro;

			}

			public function getRegistroPorProjeto(int $id_desenvolvedor, int $id_projeto): array
			{
				$queryRegistro = $this->conexao->query("SELECT * FROM registros WHERE id_desenvolvedor = $id_desenvolvedor AND id_projeto = $id_projeto");

				$registro = $queryRegistro->fetch_all(MYSQLI_ASSOC);

				return $registro;

			}

			public function atualizaHoras(string $horas_trabalhadas, int $id_registro)
			{
				$adicionaHoras = $this->conexao->prepare("UPDATE registros SET horas_trabalhadas=? WHERE id =?");

				$adicionaHoras-> bind_param('si', $horas_trabalhadas, $id_registro);

				$adicionaHoras->execute();
			}

			public function getHoras(int $id_desenvolvedor, int $id_projeto)
			{
				$getHoras = $this->conexao->query("SELECT horas_trabalhadas FROM registros WHERE id_desenvolvedor = $id_desenvolvedor AND id_projeto = $id_projeto");

				/*$horas = $getHoras->fetch_all(MYSQLI_ASSOC);*/

				return $getHoras;
			}

	}