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

	$id_usuario = $_SESSION['id'];
	$dados_categoria = $_SESSION['categoria'];

	var_dump($id_usuario);
	var_dump($dados_categoria);
	
	echo session_id();

//Gerar Relatorio - qtd, localizacao,preço

#Querys que mostrem

#Quantidade -> Selecionar da tabela contrato a quantidade de imóveis(soma) de um mesmo id_proprietario. ( contador de linhas)

#Localização -> Tabela contrato - pego id proprietario e do imovel , comparo com o id_imovel na tabela imovel e busco por (rua	cep	bairro	cidade	estado	complemento	preco).

//Atualizar dados dos imoveis

# UPDATE -> na tabela Imovel Caso Status_Alugado = Não.