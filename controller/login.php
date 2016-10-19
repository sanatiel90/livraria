<?php
ini_set('display_errors',1);


include_once dirname(__DIR__).'/model/config.php';

//responsavel pela conexao com o banco
include_once base_server().'/model/class/CConnect.class.php';

//responsavel por manipular o banco
include_once base_server().'/model/class/MManager.class.php';

//classe de usuario
include_once base_server().'/model/class/User.class.php';



//recebendo dados do form
$email = $_POST['email'];
$password = sha1($_POST['password']);


//primeiro buscar por email, vai buscar em duas tabelas
//1º tabela
$tables['tb_user'] = array(); //todas as coluunas
//2º tabela
$tables['tb_profile'] = array();
//relacao entre as duas()
$rel['tb_user.profile_id'] = "tb_profile.id_profile";
$filters['user_email'] = $email;

//realizando busca, esse espaco inicial no LIMIT 1 é para evitar sql injection
$login = MManager::select_join($tables,$rel,$filters," LIMIT 1");

//testa se algum usuario foi encontrado
if($login == false){
	//se nao for encontrado, gera erro
	header("location: ".base_url()."?error=user_not_found");

}else if($login[0]['user_status'] != 1){
	//se status for diferente de true
	header("location: ".base_url()."?error=user_inative");


} else if($login[0]['user_password'] != $password){
	//se senha incorreta, gera erro
	header("location: ".base_url()."?error=password_incorrect");

} else{

	//caso nao entre nos anteriores, é pq deu certo

	//atualizar a data de ultim acesso
	$new_date['user_last_access'] = strtotime(date("Y-m-d H:i:s"));

	//atualizando no banco, nao atualiza na sessao pois eh pra mostrar o ultimo acesso antes do atual
	MManager::update("tb_user",$new_date,$filters);



	//inicia sessao
	session_start();

	//criar obj do tipo usuario
	$user = new User($login[0]['user_name'],$email, $password);

	//setar os atributos restantes, usando foreach pra percorrer todos os campos de login[0], que contem as informacoes do usuario logado
	//e colocando osvalores dos campos na var user
	foreach($login[0] as $k => $v){
		$user->$k = $v;
	}

	//criando sessao de acordo com o perfil do usuario, e criptografando sessao
	//exemplo: Lib-Leitor, Lib-Administrador
	$_SESSION[md5("Lib-".$user->profile_name)] = $user;

	header("location: ".base_url()."/".$user->profile_page);


}

?>