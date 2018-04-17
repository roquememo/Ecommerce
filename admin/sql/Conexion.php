<?php

class Conexion{
    public function conectar(){
	    $usuario = 'root';
	    $password = '';
	    $host = 'localhost';
	    $db = 'ecommerce';
	    return $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $password);
    }
}

?>
