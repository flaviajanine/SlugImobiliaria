<?php

	session_start();

	require_once('conexaoDB.php');


	$body = file_get_contents('php://input');
	$body = trim($body);
	$obj = json_decode($body,true);


	$nome = $obj['nome'];
	$senha = md5($obj['senha']);
	$email = $obj['email'];
	//$categoria = $obj['categoria'];


	$sql = " SELECT id, nome, email,categoria FROM usuario WHERE nome = '$nome' AND senha = '$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['nome'])){

			$_SESSION['id'] = $dados_usuario['id'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];

			#teste-------------------------------------------------

			$_SESSION['categoria'] = $dados_usuario['categoria'];
			$dados_categoria = $dados_usuario['categoria'];

			//var_dump($dados_usuario['categoria']);
			//var_dump($resultado_id);
			
			
			//echo session_id();
			//header('Location: home.php');

			switch ($dados_categoria) {
				case 'inquilino':
				echo "Passou inquilino";
				#	header('Location: inquilino.php');
					break;

				case 'proprietario':
				echo "Passou Prop";
				#	header('Location: proprietario.php');
					break;

				case 'imobiliaria':
				echo "Passou Imobi";
					#header('Location: imobiliaria.php');
					break;
				
				default:
					header('Location: home.php');
					break;
			} 
		#teste-----------------------------------------------------
			
		} else {
			//header('Location: index.php?erro=1');
			var_dump($dados_usuario);
			echo 'Usuário não cadastrado';
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}