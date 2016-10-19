<?php

include_once dirname(__DIR__).'/model/config.php';
include_once base_server().'/model/class/CConnect.class.php';
include_once base_server().'/model/class/MManager.class.php';

session_start();

if(!isset($_SESSION[md5("Lib-Bibliotecario")])){
	header("location: ".base_url().'/?error=permission_denied');
}

$new_data['category_name'] = $_POST['name'];
$new_data['category_desc'] = $_POST['desc'];


$filters['id_category'] = $_POST['filter'];


MManager::update("tb_category",$new_data,$filters);


header("location: ".base_url().'/?success=cat_updated');

?>