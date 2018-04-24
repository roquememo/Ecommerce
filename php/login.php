<?php 
include 'conexion.php';
if ((isset($_GET['correo']))&&(isset($_GET['password']))) {
	
	$user=inputSeguro($mysqli,$_GET['correo']);
	$pass=inputSeguro($mysqli,$_GET['password']);
<<<<<<< HEAD
	$passSegura=md5($pass);
	$consulta="SELECT * FROM usuario WHERE correo='".$user."' AND password= '".$passSegura."'";
=======
	$consulta="SELECT * FROM usuario WHERE correo='".$user."' AND password= md5('".$pass."')";
>>>>>>> be52a7510338b2a180e46e71d0f306c2a42cb2c3
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
		echo '1';
	}
	else{
		echo '2';
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
