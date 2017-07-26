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
	

	/* # PEGAR ESSE ID COM A CATEGORIA E INSERIR EM UMA QUERY
	$id_usuario = $_SESSION['id'];
	$texto_reclama = $obj['texto'];

	var_dump($id_usuario);

	#### TESTE NO BANCO DE DADOS ESTA COMO RECLAMACOES #####
	$sql = " INSERT INTO reclamacoes1(texto_reclamacao,id_inquilino)values('$texto_reclama','$id_usuario') ";

	mysqli_query($link, $sql) or die ("Erro na query ");
	################################### TESTE #################
	
	*/

	reclamacao($obj,$link);