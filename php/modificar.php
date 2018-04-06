<?php  
include 'conexion.php';

session_start();

	
if (isset($_SESSION['id'])) {
	$id=$_SESSION['id'];

$consulta = "SELECT *FROM usuario A INNER JOIN direccion B ON A.id_direccion =B.id_direccion WHERE A.id_usuario='".$id."'";

$resultado=$mysqli->query($consulta);
$row = mysqli_fetch_assoc($resultado);
$valor= json_encode($row);
	
echo $valor;

}


 ?>

