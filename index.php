<?php

	//incluindo o arquivo de endereços
	include_once 'model/config.php';

	//Requisitando arquivos importantes
	include_files();

	//inicia a sessao
	session_start();

	//testa se existe usuario logado e adiciona a pagina correta, admin, bibliotecario, leitor, etc
	if(isset($_SESSION[md5('Lib-Administrador')])){
		header("location: admin.php");
	} else if(isset($_SESSION[md5('Lib-Bibliotecario')])){
		header("location: librarian.php");

	}

	//definir o titulo da pagina
	$page_title = "Página inicial - Login";

	//define se é um menu ou login
	function page_sidebar(){
		include_once base_server()."/view/login.php";
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

