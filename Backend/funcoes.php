<?php
		


	 function cadastrar_imobiliaria($obj_json,$link)
	{	
		//JSON Padrão
		$nome = $obj_json['nome'];
		$email = $obj_json['email'];
		$senha = md5($obj_json['senha']);
		$categoria = $obj_json['categoria'];

		//JSON imobiliaria
		$cnpj = $obj_json['cnpj'];

		$sql1	= "INSERT INTO usuario(nome,email,senha,categoria) values ('$nome','$email','$senha','$categoria')" ;

		$sql2 	= "INSERT INTO imobiliaria(nome,cnpj) values ('$nome','$cnpj')";

		mysqli_query($link, $sql1) or die ("Erro na query 1"); 

		mysqli_query($link, $sql2) or die ("Erro na query 2");

	
	}

	 function cadastrar_inquilino($obj_json,$link)
	{	
		//JSON Padrão
		$nome = $obj_json['nome'];
		$email = $obj_json['email'];
		$senha = md5($obj_json['senha']);
		$categoria = $obj_json['categoria'];


		// JSON Inquilino   
		$cpf = $obj_json['cpf'];
		$sobrenome = $obj_json['sobrenome'];

		$sql1	= "INSERT INTO usuario(nome,email,senha,categoria) values ('$nome','$email','$senha','$categoria')" ;
		mysqli_query($link, $sql1) or die ("Erro na query 1"); 
		$id_usuario = mysqli_insert_id($link);

		$sql2 	= "INSERT INTO inquilino(nome,sobrenome,cpf,id_usuario) values ('$nome', '$sobrenome', '$cpf','$id_usuario')";

		mysqli_query($link, $sql2) or die ("Erro na query 2");
		
		
	}




	 function cadastrar_proprietario($obj_json,$link)
	{	
		//JSON Padrão
		$nome = $obj_json['nome'];
		$email = $obj_json['email'];
		$senha = md5($obj_json['senha']);
		$categoria = $obj_json['categoria'];

		//JSON proprietario  
		$sobrenome = $obj_json['sobrenome'];
		$cpf = $obj_json['cpf'];
		$rua = $obj_json['rua'];
		$cep = $obj_json['cep'];
		$bairro = $obj_json['bairro'];
		$cidade =$obj_json['cidade'];
		$estado =$obj_json['estado'];
		$complemento =$obj_json['complemento'];

		$id_imobiliaria = $_SESSION['id'];

		//Cadastrar_Proprietario($obj);
		$sql1	= "INSERT INTO usuario(nome,email,senha,categoria) values ('$nome','$email','$senha','$categoria')" ;
		mysqli_query($link, $sql1) or die ("Erro na query 1"); 
		$id_usuario = mysqli_insert_id($link);

		$sql2 	= "INSERT INTO proprietario(id_imobiliaria_cadastrou,nome,sobrenome,cpf,rua,cep,bairro,cidade,estado,complemento,id_usuario) values ('$id_imobiliaria','$nome','$sobrenome','$cpf', '$rua','$cep','$bairro','$cidade','$estado','$complemento','$id_usuario')";


		mysqli_query($link, $sql2) or die ("Erro na query 2");


		
	}



	#Imobiliaria
	function cadastrar_imovel($obj_json,$link)
	{
		

	$rua = $obj_json['rua'];
	$cep = $obj_json['cep'];
	$bairro = $obj_json['bairro'];
	$cidade = $obj_json['cidade'];
	$estado = $obj_json['estado'];
	$complemento = $obj_json['complemento'];
	$preco = $obj_json['preco'];
	$status_alugado = $obj_json['status_alugado'];
	$id_proprietario = $_SESSION['id'];

	$sql = "INSERT INTO imovel(rua,cep,bairro,cidade,estado,complemento,preco,id_proprietario,status_alugado) values ('$rua','$cep','$bairro','$cidade','$estado','$complemento','$preco','$id_proprietario','$status_alugado')" ;

		mysqli_query($link, $sql) or die ("Erro na query 1"); 
		$id_imovel = mysqli_insert_id($link);

	}


	function pedido_manutencao($obj_json,$link)
	{

	$tipo = $obj_json['tipo'];
	$id_usuario = $_SESSION['id'];

	# $consulta = "SELECT FROM contrato values id_imovel and id_inquilino WHERE  ";

	$sql = " INSERT INTO pedido_manutencao(id_inquilino,tipo_manutencao) values('$id_usuario','$tipo') "; 
	

	mysqli_query($link, $sql) or die ("Erro na query ");

	//Falta fazer a relação com o inquilino e o imovel

	}

	function reclamacao($obj_json,$link){

	$id_usuario = $_SESSION['id'];
	$texto_reclama = $obj_json['texto'];
	
	#$id_inquilino = "SELECT id_inquilino FROM inquilino WHERE ('$id_usuario' = 'id_usuario')";



	#### TESTE NO BANCO DE DADOS ESTA COMO RECLAMACOES #####
	$sql = " INSERT INTO reclamacoes(texto_reclamacao,id_inquilino) values('$texto_reclama','$id_usuario') "; 



	mysqli_query($link, $sql) or die ("Erro na query 2");



	}

