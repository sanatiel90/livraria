<?php
	ini_set('display_errors',1);
	//ARQUIVO PARA GERAR OS ARQUIVOS DE MENU

	//variavel global com as opcoes de menu disponiveis para operfil admin
	$GLOBALS['menu']['admin'] = array(
		//gerenciar usuarios
		'users' => array(
				'icon' => "user",
				'text' => "Usuários",
				'href' => "users",
			),


		);


	//variavel global com as opcoes de menu disponiveis para operfil bibliotecarios(librarian)
	$GLOBALS['menu']['librarian'] = array(
		//gerenciar livros
		'books' => array(

				'icon' => "book",
				'text' => "Livros",
				'href' => "books",
			),

		//gerenciar categorias
		'categories' => array(

				'icon' => "tags",
				'text' => "Categories",
				'href' => "categories",


			),



		);


?>