<?php

ini_set('display_errors',1);


include_once dirname(__DIR__).'/model/config.php';

//responsavel pela conexao com o banco
include_once base_server().'/model/class/CConnect.class.php';

//responsavel por manipular o banco
include_once base_server().'/model/class/MManager.class.php';


session_start();

if(!isset($_SESSION[md5('Lib-Bibliotecario')])){
	header("location: ".base_url()."?error=permission_denied");
}


//receber os dados via post
$filters['id_category'] = $_POST['filter'];

MManager::delete("tb_category",$filters);

header("location: ".base_url()."/librarian.php?success=category_deleted&option=categories");


?>