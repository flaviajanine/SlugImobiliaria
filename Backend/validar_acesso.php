<?php

	session_start();

	require_once('conexaoDB.php');

	$body = file_get_contents('php://input');
	$body = trim($body);
	$obj = json_decode($body,true);


	$nome = $obj['nome'];
	$senha = md5($obj['senha']);


	$sql = " SELECT id, nome, email FROM usuario WHERE nome = '$nome' AND senha = '$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];
			
			

		} else {
			echo 'Travou aqui';
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}