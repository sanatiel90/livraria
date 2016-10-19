<?php 
	//dicionario
	$GLOBALS['dictionary'] = array(
		'error' => "Erro 404 - Informação não encontrada",
		'user_created' => "Usuario Criado com sucesso",
		'permission_denied' => "Permissão Negada",
		'book_created' => "Novo Livro Inserido",
		'insert_error' => "Erro ao inserir no banco de dados",
		'user_not_found' => "Usuário não encontrado",
		'password_incorrect'=> "Senha incorreta",
		'user_inative'=> "Usuário inativo",
		'user_logout'=> "Você foi desconectado",
		'user_updated'=> "Dados atualizados com sucesso",
		'user_deleted'=> "O usuário foi excluído",
		'category_created'=> "Categoria criada",
		'category_deleted'=> "Categoria excluida",
	);

	function dictionary($msg){
		if(isset($GLOBALS['dictionary'][$msg])){
		return $GLOBALS['dictionary'][$msg];
		}else{
			return $GLOBALS['dictionary']['error'];
		}
		
	}

?>