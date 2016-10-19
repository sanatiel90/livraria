<?php



include_once 'Connect.class.php';
include_once 'Manager.class.php';


$table = "tb_profile";

$data['profile_name'] = "estudante";
$data['profile_page'] = "student.php";


$id = Manager::insert($table, $data);

echo "o perfil $id foi inserido";


?>