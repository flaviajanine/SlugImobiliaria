
<?php

echo "

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Compra/Venda</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
	<script src='validacao.js'></script>
        </script>
    </head>
    <body>
	<h1>Informações do Produto</h1>
	<div>
        <form name='meuform' method='post' action='conexaodb.php' onsubmit='return validateForm()'>
	    <label for='codMercadoria'>Codigo Mercadoria:</label><br>
            <input type='text' name='codMercadoria'><br>
            <label for='tipoMercadoria'>Tipo da Mercadoria:</label><br> 
	    <input type='text' name='tipoMercadoria'><br>
            <label for='nomeMercadoria'>Nome:</label><br> 
            <input type='text' name='nomeMercadoria'><br>
	    <label for='Quantidade'>Quantidade:</label><br> 
            <input type='text' name='Quantidade'><br>
	    <label for='Preco'>Preco:</label><br>
            <input type='text' name='Preco'><br>
	    <label for='tipoNegocio'>Tipo do Negocio</label><br>
            <input type='radio' name='tipoNegocio' value='Compra'>Compra<br>
            <input type='radio' name='tipoNegocio' value='Venda'>Venda<br>
            <input type='submit' id='botao' value='Inserir Dados'>
        </form>
	</div>
    </body>
</html> ";

?>
