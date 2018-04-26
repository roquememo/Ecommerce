<?php  
include 'conexion.php';

session_start();

	
if (isset($_SESSION['id'])) {
	$id=$_SESSION['id'];

$consulta = "SELECT *FROM usuario A INNER JOIN direccion B ON A.id_direccion =B.id_direccion WHERE A.id_usuario='".$id."'";
$stmt = $mysqli->query($consulta);
			$con=array();
			$row=$stmt->fetch_row();	
			$con['id_usuario']=$row[0];
			$con['nombre']=$row[1];
			$con['apellido']=$row[2];
			$con['correo']=$row[3];
			$con['password']=$_SESSION['password'];
			$fecha=explode("-", $row[5]);
			$con['anio']=$fecha[0];
			$con['mes']=$fecha[1];
			$con['dia']=$fecha[2];
			$con['id_direccion']=$row[6];
			$con['nombre_direccion']=$row[8];
			$con['direccion_2']=$row[9];
			$con['ciudad']=$row[10];
			$con['departamento']=$row[11];
			$con['telefono1']=$row[12];
			$con['telefono2']=$row[13];
			$con['coordenada']=$row[15];

$valor= json_encode($con);
	
echo $valor;

}


 ?>

