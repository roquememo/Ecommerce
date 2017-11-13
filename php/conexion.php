<?php 

$usuario = "root";
//$password = "password";
$password = "password";
$servidor = "localhost";
$basededatos = "ecommerce";

$mysqli = new mysqli($servidor, $usuario, $password, $basededatos);
mysqli_set_charset($mysqli, 'utf8');
 ?>