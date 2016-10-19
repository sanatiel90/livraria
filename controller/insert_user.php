<?php
ini_set('display_errors',1);
//incluindo arq de configuracao
include_once dirname(__DIR__).'/model/config.php';

//responsavel pela conexao com o banco
include_once base_server().'/model/class/CConnect.class.php';

//responsavel por manipular o banco
include_once base_server().'/model/class/MManager.class.php';


//recebendo dados do form
$new_user['user_name'] = $_POST['name'];
$new_user['user_email'] = $_POST['email'];
$new_user['user_password'] = sha1($_POST['password']);

//dados complementares

//inicia sessao
session_start();
//se quem estiver logado for admin, vai cadastrar o perfil de acordo com o q foi escolhido
//no form de cadastro, seja admin, bibliotecario ou leitor
if(isset($_SESSION[md5('Lib-Administrador')])){
	$new_user['profile_id'] = $_POST['profile'];
	$page = "admin.php";

} else{

	//caso quem estiver logado nao for admin, entao o usuario cadastrado automaticamente
	//tera perfil leitor, pois so o admin pode cadastrar outros perfis
	$new_user['profile_id'] = 3;
	$page = "";
}

$new_user['user_status'] = 1;

//inserindo, informando a tabela e o array com os dados
$confirm = MManager::insert("tb_user",$new_user);

//validacao
if($confirm != false){
	//para usar o header nao pode haver no arquivo php nenhum echo, print ou outro comando de sair de dados
	//usa-se o & para mandar mais de uma requisicao GET ao msm tempo
	header("location: ".base_url()."?option=add_user&success=user_created");

}else{	
	header("location: ".base_url()."?error=insert_error");
}


?>