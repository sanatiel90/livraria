<?php

	//incluindo o arquivo de endereços
	include_once 'model/config.php';

	//incluindo arquivo de class do usuario
	include_once 'model/class/User.class.php';

	//Requisitando arquivos importantes
	include_files();

	//inicia a sessao
	session_start();

	//verifica se o q esta logado eh admin
	if(!isset($_SESSION[md5("Lib-Bibliotecario")])){
		header("location: index.php?error=permission_denied");
	}


	//resgatar os dados que estao na sessao
	$user = $_SESSION[md5("Lib-Bibliotecario")];



	//definir o titulo da pagina
	$page_title = "Área do Bibliotecário";

	//define se é um menu ou login
	function page_sidebar(){
		//qual menu aparecerá
		$m = $GLOBALS['menu']['librarian'];
		include_once base_server()."/view/menu.php";


	}

	//define conteúdo da página
	function page_content(){
		Validate::success();
		Validate::error();
		Validate::option();
	}

	//incluir a base do template
	include_once 'view/base.php';

	

?>





