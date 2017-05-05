<?php

echo "
<!DOCTYPE html>
<html>
    <head>
        <title>Compra/Venda</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
    <h1>Lista de Negócios</h1>
	<div>
<table>
 <thead>
  <tr>
     <th>ID Negócio</th>
     <th>Código Mercadoria</th>
     <th>Tipo Mercadoria</th>
     <th>Nome Mercadoria</th>
     <th>Quantidade</th>
     <th>Preco</th>
     <th>Tipo Negócio</th>
  </tr>
 </thead>
<tbody>
	
	";
	$host="fdb14.eohost.com:3306";
	$user="2131243_loja";
	$pass="9951flavia";
	$dbname="2131243_loja";

	$conexao=mysql_connect($host,$user,$pass);
	$selectdb=mysql_select_db($dbname);

	$query = "SELECT * FROM CompraVenda";
	$resultado = mysql_query($query, $conexao);
	$total = mysql_num_rows($resultado);
	 
	
	if ($total > 0){
		for ($i = 0; $i < $total; $i++) {
			echo "<tr>";
			$row = mysql_fetch_row($resultado);
			$idNegocio = $row[0];
			$codMercadoria = $row[1];
			$tipoMercadoria = $row[2];
			$nomeMercadoria = $row[3];
			$Quantidade = $row[4];
			$Preco = $row[5];		
			$tipoNegocio =	$row[6];

			echo "<td>$idNegocio</td>
			     <td>$codMercadoria</td>
			     <td>$tipoMercadoria</td>
			     <td>$nomeMercadoria</td>
			     <td>$Quantidade</td>
			     <td>$Preco</td>
			     <td>$tipoNegocio</td>";
			echo "</tr>";
		}
	}

echo "
</tbody>
</table>
	</div>
</html>";

?>
