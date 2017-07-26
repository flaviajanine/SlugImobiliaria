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


#APENAS TESTE E ENTENDER O QUE FAZ O INQUILINO, NÃO ESTA FUNCIONAL

	$tarefa =$obj['tarefa'];

switch ($tarefa) {

	case 'Boleto':
		# code...
		break;

	case 'Reparo':
		header('Location: reparo.php');
		break;

	case 'Reclamacao':
		header('Location: reclamacao.php');
		break;
	
	case 'Alugar':
		# code...
		break;

	default:
		# code...
		break;
}



