<?php

class Conexion{
    public function conectar(){
	    $usuario = 'root';
	    $password = '';
	    $host = '127.0.0.1';
	    $db = 'ecommerce';
	    return $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $password);
    }
}

?>
