<?php

	$host="localhost";
	$user="";
	$pass="admin";
	$dbname="id1245507_slug";
			

	$conexao=mysql_connect($host,$user,$pass);
	$selectdb=mysql_select_db($dbname);

	$user = $GET["uname"];
    $pwd = $GET["psw"];

    $sql = "SELECT * FROM `imobiliaria`.`usuarios` WHERE (nome = '".$user."') AND (senha = '".$pwd."')";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) != 1) {
        echo "Senha incorreta!";
        } else {
    header('Location: logado.php');
    }
    mysqli_close($conn);


?>