<?php
	$host="fdb14.eohost.com:3306";
	$user="2131243_loja";
	$pass="9951flavia";
	$dbname="2131243_loja";
			
	$conexao=mysql_connect($host,$user,$pass);
	$selectdb=mysql_select_db($dbname);
	
	$codMercadoria = $_POST["codMercadoria"];
	$tipoMercadoria = $_POST["tipoMercadoria"];
	$nomeMercadoria = $_POST["nomeMercadoria"];
	$Quantidade = $_POST["Quantidade"];
	$Preco = $_POST["Preco"];		
	$tipoNegocio = $_POST["tipoNegocio"];	

	$query = "INSERT INTO CompraVenda(cod_Mercadoria, tipo_Mercadoria, Nome, Quantidade, Preco, tipo_Negocio)
	VALUES('$codMercadoria','$tipoMercadoria','$nomeMercadoria','$Quantidade', '$Preco','$tipoNegocio')";
	$resultado = mysql_query($query, $conexao);
	
	header('Location: lista.php');
	
?>

