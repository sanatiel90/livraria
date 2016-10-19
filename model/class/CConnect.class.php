<?php

	class CConnect{
		//variavel que guardará uma instancia de PDO
		//ou seja, a conexao
		private static $instance;
	
		//responsavel por criar e retornar a conexao
		public static function get_instance(){
			//se ainda não existir conexao, crie.
			//self usado para acessar um atributo estatico(funciona como o this, para acessar um static da propria classe)
			if(!isset(self::$instance)){
				$host = "localhost";
				$user = "root";
				$password = "utd123456";
				$database = "db_t_book";

				self::$instance = new PDO("mysql:host=$host; dbname=$database;", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
						
				//configurar os erros e excessoes
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

			}

			//retornar a instacia conexao
			return self::$instance;
		}


		//funcao para fechar conexao
		public static function close_instance(){
			if(self::$instance != null){
				self::$instance = null;
				
			}

		}




	}






?>