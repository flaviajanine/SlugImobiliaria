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

		//Cadastrar_Proprietario($obj);
		$sql1	= "INSERT INTO usuario(nome,email,senha,categoria) values ('$nome','$email','$senha','$categoria')" ;
		mysqli_query($link, $sql1) or die ("Erro na query 1"); 
		$id_usuario = mysqli_insert_id($link);

		$sql2 	= "INSERT INTO proprietario(nome,sobrenome,cpf,rua,cep,bairro,cidade,estado,complemento,id_usuario) values ('$nome','$sobrenome','$cpf', '$rua','$cep','$bairro','$cidade','$estado','$complemento','$id_usuario')";


		mysqli_query($link, $sql2) or die ("Erro na query 2");


		
	}