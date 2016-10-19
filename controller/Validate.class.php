<?php 


	
	class Validate{
		//Validar mensagens de sucesso
		public static function success(){
			//testa se existe $_GET['success']
			if(!isset($_GET['success'])){
				return false;
			}

			$alert_class = "info";
			$alert_text = dictionary($_GET['success']);
			$alert_icon = "ok-sign";

			include base_server().'/view/alert.php';
		}

		//Validar mensagens de erro
		public static function error(){
			//testa se existe erro
			if(!isset($_GET['error'])){
				return false;
			}

			$alert_class = "danger";
			$alert_icon = "warning-sign";
			$alert_text = dictionary($_GET['error']);

			include base_server().'/view/alert.php';
		}

		//Validar açoes via $_GET
		public static function option(){
			//testa se existe opção
			if(!isset($_GET['option'])){
				include_once base_server().'/view/welcome.php';
				return false;
			}

			//ter acesso, nos arquivos acessados via option GET, aos dados do usuario logado
			global $user;

			//arquivos para manipular o banco
			include_once base_server().'/model/class/CConnect.class.php';
			include_once base_server().'/model/class/MManager.class.php';


			switch($_GET['option']){
				case "add_user":
					if(isset($user) && $user->profile_name == "Administrador"){
						$profiles = MManager::select("tb_profile",null,null," ORDER BY profile_name");
					}

					include_once base_server().'/view/user/add_user.php';

					return true;
					break;

				case "profile":
					include_once base_server().'/view/user/edit_profile.php';

					return true;
					break;	

				case "users":
					if($user->profile_name != "Administrador"){
						return false;
					}

					//buscar usuarios no banco
					$tables['tb_user'] = array();
					$tables['tb_profile'] = array("profile_name");
					$rel['tb_user.profile_id'] = "tb_profile.id_profile";
					//var results vai receber o resultado da consulta
					$results = MManager::select_join($tables, $rel, null, "ORDER BY user_name");


					/////////////TESTE
					///////////////
					//vai fazer uma consulta simples ao banco, com filtro id_user para retornar apenas 1 linha, q eh o usuario autal
					//depois esse resultado obtido sera colocado na var $tt e no arquivo LIST sera passado para uma var json
					/*$filtross['id_user'] = $user->id_user;
					$tt = MManager::select("tb_user",null,$filtross);	*/	
					///////////////TESTE
					///////////////////

					//opcao para adicionar
					$add = "add_user";

					//texto q aparecera
					$text = "Usuários";

					//quais elementos mostrar e como mostrar
					$titles = array(
						'id_user' => "ID",
						'user_name' => "Nome",
						'user_email' => "Email",
						'profile_name' => "Tipo de Conta",
						'user_created_in'=> "Criado em",

						);

					//sao acoes que permitem coisas extras 
					//actions para deletar usuario
					$actions['delete'] = array(
						'filter' => "id_user",
						'href' => "delete_user.php",
						'text' => "Excluir",
						'icon' => "trash",
						'class' => "danger",
					);

					
					//actions para atualizar usuario
					$actions['update'] = array(
						'filter' => "id_user",
						'href' => "?option=update_user",
						'text' => "Editar",
						'icon' => "wrench",
						'class' => "warning",
					);


						

					include_once base_server().'/view/list.php';

					return true;
					break;	

				
				case "update_user":	
					if(!isset($user) || $user->profile_name != "Administrador"){
						return false;
					}
					
					if(!isset($_GET['filter'])){
						return false;
					}

					//buscando usuario do filtro
					$tables['tb_user'] = array();
					$tables['tb_profile'] = array();
					$rel['tb_user.profile_id'] = "tb_profile.id_profile";
					$filters['id_user'] = $_GET['filter'];
					$data_user = MManager::select_join($tables,$rel,$filters);

					//buscando profiles
					$profiles = MManager::select("tb_profile",null,null);

					//include view
					include_once base_server().'/view/user/edit_user.php';

					return true;
					break;

				case "categories":
					if(!isset($user) || $user->profile_name != "Bibliotecario"){
						return false;
					}

					//buscando as categorias
					$results = MManager::select("tb_category", null, null, " ORDER BY category_name");

					//texto da tabela
					$text = "Categorias";

					//titulos(th) da tabela
					$titles = array(
						'category_name' => "Categoria",
						'category_desc' => "Descrição",
					);

					//linkar o formde cadastro de categoria
					$add = "add_category";

					//opcoes de excluir
					$actions['delete'] = array(
						'filter' => "id_category",
						'href' => "delete_category.php",
						'text' => "Excluir",
						'icon' => "trash",
						'class' => "danger",
					);


					$actions['update'] = array(
						'filter'=>"id_category",
						'href'=> "?option=update_category",
						'text'=> "Editar",
						'icon'=> "pencil",
						'class'=> "warning",


					);
					


					include_once base_server().'/view/list.php';



					return true;
					break;


				case "add_category":
					if(!isset($user) || $user->profile_name != "Bibliotecario"){
						return false;
					}

					include_once base_server().'/view/category/add_category.php';

					return true;
					break;	

				case "update_category":	
					if(!isset($user) || $user->profile_name != "Bibliotecario"){
						return false;
					}
					
					if(!isset($_GET['filter'])){
						return false;
					}

					//filtro para select
					$filters['id_category'] = $_GET['filter'];
					$data_cat = MManager::select("tb_category",null,$filters," LIMIT 1");

					//include view
					include_once base_server().'/view/category/edit_category.php';

					return true;
					break;	


			}
		}
	}

 ?>