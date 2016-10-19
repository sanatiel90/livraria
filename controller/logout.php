<?php

include_once dirname(__DIR__).'/model/config.php';

session_start();

//destroi a sessao, fazendo assim o logout
session_destroy();

header("location: ".base_url()."?success=user_logout");

?>