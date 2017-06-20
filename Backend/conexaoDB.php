<?php

/* https://phpbestpractices.org/#utf-8 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

class db {

	
	 
	//private $host = 'localhost';
	//private $usuario_db = 'id1245507_admin';
	//private $senha_db = '';
	//private $data_base  = 'id1245507_slug';


	private $host = 'localhost';
	private $usuario_db = 'root';
	private $senha_db = '';
	private $data_base  = 'imobiliaria_db';


	public function conecta_mysql(){

		//criar a conexao
		$con = mysqli_connect($this->host, $this->usuario_db, $this->senha_db, $this->data_base);

		//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($con, 'utf8');

		//verficar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();	
		}

		return $con;
	}

}