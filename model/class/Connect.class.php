<?php

class Connect{

	//variavel que guardará uma instancia de PDO, ou seja, a conexao
	private static $con;


	//metodo responsavel por criar e retornar a conexao
	public static function get_con(){

		//se ainda nao existir instancia de conexao, crie uma
		if(!isset(self::$con)){

			//cria as 4 variaveis padrao com as informacoes do servidor,usuario,senha e bd
			$host = "localhost";
			$user = "root";
			$password = "utd123456";
			$database = "db_t_book";

			//cria novo objeto PDO a partir do static $con, e informa as variaveis			//array pdo para setar os nomes com formato utf8
			self::$con = new PDO("mysql:host=$host; dbname=$database;", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			//configuar gerar erros e excecoes
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//tratar campos nulos e em branco
			self::$con->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

		}





		//retornar a instancia de conexao
		return self::$con;
	}

}




?>