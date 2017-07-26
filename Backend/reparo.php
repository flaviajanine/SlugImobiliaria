<?php 


	session_start();

	

	if(!isset($_SESSION['id']))

	{
		//header('Location: index.php?erro=1');
		echo "Não está logado";
	}

	require_once('conexaoDB.php');
	require_once('funcoes.php');

	$body = file_get_contents('php://input');
	$body = trim($body);
	$obj = json_decode($body,true);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$tipo_manutencao = $obj['tipo'];

	# PEGAR ESSE ID COM A CATEGORIA E INSERIR EM UMA QUERY
	$id_usuario = $_SESSION['id'];

	$dados_categoria = $_SESSION['categoria'];
	

//Ir na tabela contrato, selecionar id_inquilino e id_imovel e inserir na tabela pedido_manutencao junto com o tipo de manutencao (hidraulico,eletrico ou estrutural).

	switch ($tipo_manutencao) {
		case 'Hidraulico':

			pedido_manutencao($obj,$link);
			echo "passou aqui no pedido 1 ";
			break;

			case 'Elétrico':
			pedido_manutencao($obj,$link);
			echo "passou aqui no pedido 2 ";
			break;

			case 'Estrutural':
			pedido_manutencao($obj,$link);
			echo "passou aqui no pedido 3";
			break;
		
		default:
			echo 'aqui';
			break;
	}