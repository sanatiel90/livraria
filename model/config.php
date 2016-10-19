<?php

	//endereço web da aplicação
	$GLOBALS['base_url'] = "http://".$_SERVER['SERVER_NAME']."/tarde/sistema";

	//endereço fisico da aplicação
	$GLOBALS['base_server'] = $_SERVER['DOCUMENT_ROOT']."/tarde/sistema";

	function base_url(){
		return $GLOBALS['base_url'];
	}

	function base_server(){
		return $GLOBALS['base_server'];
	}


//funcao para inclusao dos arquivos que aparecem em todas as páginas
	function include_files(){
		include_once base_server().'/controller/Validate.class.php';
		include_once base_server().'/model/dictionary.php';
		include_once base_server().'/model/menu.php';
		
	}
	



	
?>