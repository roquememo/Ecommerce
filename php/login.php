<?php 
include 'conexion.php';
if ((isset($_GET['correo']))&&(isset($_GET['password']))) {
	
	$user=inputSeguro($mysqli,$_GET['correo']);
	$pass=inputSeguro($mysqli,$_GET['password']);
<<<<<<< HEAD
	
	//$coordenates  = null;
	//$coordenates = $_GET['coordenates'];
	//$target = null;
    $consulta = "SELECT *FROM usuario A INNER JOIN direccion B ON A.id_direccion =B.id_direccion WHERE A.correo='".$user."' AND A.password='".$pass."' ";
	
=======
	$consulta="SELECT * FROM usuario WHERE correo='".$user."' AND password= '".$pass."'";
>>>>>>> f8858a14661ed695d0379a50be9de113031648d1
	$stmt = $mysqli->query($consulta);

	if($row=mysqli_fetch_array($stmt)){
		session_start();
		$_SESSION['id']=$row['id_usuario'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['apellido']=$row['apellido'];
		$_SESSION['correo']=$row['correo'];
		$_SESSION['password']=$row['password'];
        $_SESSION['cumple']=$row['fecha_nac'];
		$_SESSION['direccion']=$row['id_direccion'];
<<<<<<< HEAD
		$_SESSION['nombre_direccion']=$row['nombre_direccion'];
		
	    echo "1";	
		// Begin to update coordenates for the user! (Update coordenates for each session!)------------
		/*$target = $row['id_direccion'];
		$sql = "UPDATE direccion SET coordenada = '$coordenates' 
		        WHERE id_direccion = '$target'";
		$other = $mysqli->query($sql);*/
		// End updating!----------------------------------------
		
		

	}
	else{
		echo "2";
=======
		echo '1';
	}
	else{
		echo '2';
>>>>>>> f8858a14661ed695d0379a50be9de113031648d1
	}
	$mysqli->close();

}else{
	echo "Error desconocido 02";
}



function inputSeguro($conexion,$post)
{
    $input = htmlentities($post);
    $seguro = mysqli_real_escape_string ($conexion,$input);
    return $seguro;
}

?>
