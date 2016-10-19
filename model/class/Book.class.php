<?php
class Book{
	private $data = array(); //dados

	public function __construct($title, $author, $category, $serial){
		$this->data['book_title'] = $title;
		$this->data['book_author'] = $author;
		$this->data['category_id'] = $category;
		$this->data['book_serial'] = $serial;
	}

	//metodo set($atributo, $valor)
	public function __set($name, $value){
		$this->data[$name] = $value;
	}

	//metodo get($atributo)
	public function __get($name){
		return $this->data[$name];
	}
}
?>