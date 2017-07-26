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

	$id_usuario = $_SESSION['id'];
	$dados_categoria = $_SESSION['categoria'];

	var_dump($id_usuario);
	var_dump($dados_categoria);

	$funcionalidade = $obj['funcionalidade'];
	$cep_existe = false;
	//$cpf_existe = false;
	$email_existe = false;

	switch ($funcionalidade) {

	case 'cadastrar_imovel':

		$cep = $obj['cep'];
		$sql = " SELECT * FROM imovel WHERE cep = '$cep'";
			if($resultado_cep = mysqli_query($link,$sql)){
				$dados_imovel = mysqli_fetch_array($resultado_cep);
				if(isset($dados_imovel['cep'])){
					$cep_existe = true;
					echo "Imóvel já Cadastrado, por favor confirme seus dados";
				}
				else {
					cadastrar_imovel($obj,$link);
					echo "Imovel Cadastrado com Sucesso  !";
					
				}
			}
			break;
		
		case 'cadastrar_proprietario' :

		$email = $obj['email'];

		$sql = " SELECT * FROM usuario WHERE email = '$email' ";
		if($resultado_id = mysqli_query($link, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		} 

if ($email_existe) {


echo "E-mail já existente, por favor informe outro !";

} 
				else {
					cadastrar_proprietario($obj,$link);
					echo "Proprietario Cadastrado com Sucesso  !";
					
				}
			}
			break;

			
	default:
		echo 'Não há nenhuma funcionalidade com esse nome:';
		break;
	}


