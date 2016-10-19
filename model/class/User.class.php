<?php
	
	/*
	class User{
		private $id_user;
		private $user_name;
		private $user_mail;
		private $user_password;
		private $profile;
		private $user_status;
		private $user_gender;
		private $user_birth;
		private $user_created_in;
		private $user_last_access;

		public function get_id_user(){
			return $this->id_user;
		}
		public function set_id_user($id_user){
			$this->id_user = $id_user;
		}

		public function get_name(){
			return $this->name;
		}
		public function set_name($name){
			$this->name = $name;
		}

		public function get_user_email(){
			return $this->user_email;
		}
		public function set_user_email($user_email){
			$this->user_email = $user_email;
		}

		public function get_user_password(){
			return $this->user_password;
		}
		public function set_user_password($user_password){
			$this->user_password = $user_password;
		}

		public function get_profile(){
			return $this->profile;
		}
		public function set_profile($profile){
			$this->profile = $profile;
		}

		public function get_user_status(){
			return $this->user_status;
		}
		public function set_user_status($user_status){
			$this->user_status = $user_status;
		}

		public function get_user_gender(){
			return $this->user_gender;
		}
		public function set_user_gender($user_gender){
			$this->user_gender = $user_gender;
		}

		public function get_user_birth(){
			return $this->user_birth;
		}
		public function set_user_birth($user_birth){
			$this->user_birth = $user_birth;
		}

		public function get_user_created_in(){
			return $this->user_created_in;
		}
		public function set_user_created_in($user_created_in){
			$this->user_created_in = $user_created_in;
		}

		public function get_user_last_access(){
			return $this->user_last_access;
		}
		public function set_user_last_access($user_last_access){
			$this->user_last_access = $user_last_access;
		}

	}*/

	class User{
		private $data = array();
	
		public function __construct($name, $email, $password){
			$this->data['user_name'] = $name;
			$this->data['user_email'] = $email;
			$this->data['user_password'] = $password;
		}

		public function __set($name, $value){
			$this->data[$name] = $value;
		}

		public function __get($name){
			return $this->data[$name];
		}
	}
?>