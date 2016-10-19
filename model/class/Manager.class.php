<?php


	class Manager extends Connect{



		public static function insert($table, $data){

			//chama a conexao
			$pdo = parent::get_con();

			//a var $data sera um array associativo que contera os campos da tabela como KEYS e os valores da tabela como VALUES 

			//preparando colunas/campos
			//a funcao array_keys recebe um array como parametro e retorna um outro array com apenas as chaves do array informado
			//a funcao implode esta recebendo o retorno da funcao array_keys(ou seja, as chaves do array informado)
			//e transformando numa string com as colunas da tabela, q esta sendo passada para a var fields
			$fields = implode(",", array_keys($data));

			//a msm coisa acontece para passar os valores, a diferenca eh q sera inserido : para os valores serem substituidos depois
			//isso eh para poder dar mais seguranca aos valores q serao inseridos, evitando sql injection
			$values = ":".implode(", :", array_keys($data));



			//inicia a query
			$sql = "INSERT INTO $table ($fields) VALUES($values)";
			
			//preparar envio da query
			$stmt = $pdo->prepare($sql);
			
			//validar campos
			//fazer um foreach no array data, sendo q a $value recebera o retorno da funcao
			//filver_var com o proprio $value; filter_var filtra o valor e o retorna, ele evita sql injection
			foreach($data as $key=>$value){
				$value = filter_var($value);

				//substituir os campos dos $keys, q estavam com campos da tabela, pelos valores msm do array data
				//o usu do PDO::PARAM_STR é para informar q os valores sao strings
				$stmt->bindValue(":$key",$value, PDO::PARAM_STR);

			}

			//concluir envio
			if($stmt->execute()){
				//caso de certo retorna o ultimo elemento q foi inserido
				return $pdo->lastInsertId();

			} else{
				//caso de errado, false
				return false;
			}



		}	//fim da funcao



		//Selecionar/Buscar(SELECT)
		//parametros: tabela, var(array) com campos, var com filtros e query extra 	
		//se query extra nao for informada, tera um valor padrao de vazio
	public static function select($table, $fields, $filters, $query_extra =""){
		//criando o objeto pdo...
		$pdo = parent::get_con();


		//preparando a sql
		$sql = "SELECT ";

		//se a var fields, que eh um array, nao estiver nula, quer dizer que foram informados os campos
		//a variavel sql entao recebera o implode do array fields, inserindo assim os campos solicitados na select
		//EX: SELECT nome_func, email+_func
		if($fields != null){
			$sql .= implode(", ", $fields);
		}else{

		//se a  var fields estiver nula, quer dizer q nao foi  informado nenhum campo especifico
		//entao  a sql eh preenchida com *, q ira retornar todos os campos	
			$sql .= "*";
		}

		//depois a sql eh complementada com FROM e a tabela q foi informada
		$sql .= " FROM $table";

		//Filtros(WHERE)
		//verifica se a var(array) filters esta nula, se nao estiver a sql sera complementada
		//com o parametro WHERE, usando um foreach no array filters para atribuir os filtros que foram
		//informados. Se mais de um filtro for informado serao colocados ANDs
		if($filters != null){
			$sql .= " WHERE ";
			foreach ($filters as $key => $value) {
				$sql .= "$key=:$key AND ";
			}
			//por fim usa substring para retirar o ultimo AND q vai ficar sobrando devido as condicoes
			$sql = substr($sql, 0, -4);
		}

		//se a consulta precisar de algo mais e adicionada uma query extra, como ORDER BY
		$sql .= $query_extra;
		

			
		//preparando consulta
		$stmt = $pdo->prepare($sql);
		
		//substituindo os parametros pelos reais valores dos filtros, caso haja...
		//aqui vai substituir os valores dos filtros, q foram valores 'falsos' pelos reais valores, assim como
		//aconteceu no insert
		if($filters != null){
			//filtrando valores para serem inseridos, tecnica segura para evitar SQL Injection...
			foreach ($filters as $key => $value) {
				$filters[$key] = filter_var($value);
			}
			foreach ($filters as $key => $value) {
				$stmt->bindValue(":$key", $value, PDO::PARAM_STR);
			}
		}

		//executando consulta
		$stmt->execute();

		//preparando resultado
		//$data sera um array que recebera o resultado da select
		$data;
		//se a query tiver resultados
		if($stmt->rowCount()){
			//var result vai ser um array que recebera as linhas de resultado do stmt->fetch enquamto houver linhas
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				$data[] = $result;
			}
			//retornando resultado da busca
			return $data;
		}else{
			return false;
		}

	}//fim do select()


		
		public static function update(){

			
		}



		public static function delete(){

			
		}



	}





?>