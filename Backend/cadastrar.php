<?php

/* https://phpbestpractices.org/#utf-8 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

//session_start();

require_once('conexaoDB.php');

require_once('funcoes.php');
/**
* 
*/



	$body = file_get_contents('php://input');
	$body = trim($body);
	$obj = json_decode($body,true);

	$objDb = new db(); //instancio a classe para usar a função interna dela 
	$link = $objDb->conecta_mysql(); //função interna da classe db

	

	//Padrão de todos os JSON
	$nome = $obj['nome'];
	$email = $obj['email'];
	$senha = md5($obj['senha']);
	$categoria = $obj['categoria'];

	//Verificar se o e-mail ja existe

	$email_existe = false;



	//verificar se o e-mail já
	$sql = " SELECT * FROM usuario WHERE email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		} 
	} else {
		echo 'Erro ao tentar localizar o registro de email';
	}


if ($email_existe) {


echo "E-mail já existente, por favor informe outro !";

} 

else {
		


switch ($categoria) {
	case 'imobiliaria':
		cadastrar_imobiliaria($obj,$link);
		echo "Imobiliaria Cadastrada com Sucesso !";
		break;
	
	case 'inquilino':
		cadastrar_inquilino($obj,$link);
		echo "Inquilino Cadastrado com Sucesso !";
		break;

	case 'proprietario':
		cadastrar_proprietario($obj,$link);
		echo "Proprietario Cadastrado com Sucesso !";
		break;

	default:
		echo "Categoria Invalida";
		break;
}

}