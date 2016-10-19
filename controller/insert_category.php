<?php

ini_set('display_errors',1);
//incluindo arq de configuracao
include_once dirname(__DIR__).'/model/config.php';

//responsavel pela conexao com o banco
include_once base_server().'/model/class/CConnect.class.php';

//responsavel por manipular o banco
include_once base_server().'/model/class/MManager.class.php';



session_start();


if(!isset($_SESSION[md5("Lib-Bibliotecario")])){
 	header("location: ".base_url().'/?error=permission_denied');
}


$new_cat['category_name'] = $_POST['name'];
$new_cat['category_desc'] = $_POST['desc'];

MManager::insert("tb_category",$new_cat);



header("location: ".base_url()."/librarian.php?success=category_created&option=categories");




	
	



?>