<?php 

$usuario = "root";
$password = "password";//"conejomemo1";
$servidor = "localhost";
$basededatos = "ecommerce";

$mysqli = new mysqli($servidor, $usuario, $password, $basededatos);
mysqli_set_charset($mysqli, 'utf8');
 ?>