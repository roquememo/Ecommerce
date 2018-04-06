<?php 

session_start();

if(isset($_SESSION['id'])){
	$datos['id']=$_SESSION['id'];
	$datos['nombre']=$_SESSION['nombre'];
	$datos['apellido']=$_SESSION['apellido'];
	$datos['correo']=$_SESSION['correo'];
	$datos['cumple']=$_SESSION['cumple'];
	$datos['direccion']=$_SESSION['direccion'];


	
	$valor= json_encode($datos);
	echo $valor;
}else{
	echo "error";
}

?>