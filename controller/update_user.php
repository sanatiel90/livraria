<?php

include_once dirname(__DIR__).'/model/config.php';
include_once base_server().'/model/class/CConnect.class.php';
include_once base_server().'/model/class/MManager.class.php';
include_once base_server().'/model/class/User.class.php';


session_start();

if(isset($_SESSION[md5('Lib-Administrador')])){
	$user = $_SESSION[md5('Lib-Administrador')];

} elseif (isset($_SESSION[md5('Lib-Bibliotecario')])) {
	$user = $_SESSION[md5('Lib-Bibliotecario')];
} elseif (isset($_SESSION[md5('Lib-Leitor')])) {
	$user = $_SESSION[md5('Lib-Leitor')];
} else{

	header("location: ".base_url()."?error=permission_denied");
}


$new_data['user_name'] = $_POST['name'];
$new_data['user_email'] = $_POST['email'];

if(isset($_POST['filter'])){
	$new_data['profile_id'] = $_POST['profile'];
}




if($_POST['password'] != ""){
		$new_data['user_password'] = sha1($_POST['password']);
}


//resgatando dados antigos do usu
//filtro para atualizar apenas este usuario, a var filter vai receber o id do usuario logado
//antes verifica se esta atualizando o proprio usuario ou outro usuario
//este isset($_POST['filter']) é informando q algum admin esta alterando dados de alguem 
if($user->profile_name == "Administrador" && isset($_POST['filter'])){

	//filtro para atualizar outro usuario q foi selecionado numa lista
	$filters['id_user'] = $_POST['filter'];

	MManager::update("tb_user",$new_data,$filters);

}  else{
	//filtro para atualizar apenas este usuario
	$filters['id_user'] = $user->id_user;
	
	//metodo para atualizar
	MManager::update("tb_user",$new_data,$filters);

	//atualizar na sessao
	$user->user_name = $new_data['user_name'];
	$user->user->email = $new_data['user_email'];

	$_SESSION[md5("Lib-".$user->profile_name)] = $user;

	
}





header("location: ".base_url()."/".$user->profile_page."?success=user_updated");




?>