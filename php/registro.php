<?php 
	include 'conexion.php';
	$dia = $_GET['cbxDia'];
	$mes = $_GET['cbxMes'];
	$ano = $_GET['cbxAno'];
	$fecha_nac=$ano."-".$mes."-".$dia;
	$indiceDepartamento = $_GET['cbxDepartamento'];
	$departamento="";
	if($indiceDepartamento == 1){
	    $departamento = "Francisco Morazán";
	}
	if($indiceDepartamento == 2){
	    $departamento = "Cortés";
	}
	if($indiceDepartamento == 3){
	    $departamento = "Comayagua";
	}
	if($indiceDepartamento == 4){
	    $departamento = "Choluteca";
	}
	if($indiceDepartamento == 5){
	    $departamento = "Olancho";
	}
	$nombre = $_GET['txtNombre'];
	$apellido = $_GET['txtApellido'];
	$correo = $_GET['txtEmail'];
	$password = $_GET['txtContrasena'];
	$nombre_direccion = $_GET['txtDireccion'];
	$direccion2 = $_GET['txtDireccion2'];
	$ciudad = $_GET['txtCiudad'];
	$telefono1 = $_GET['txtTelefono'];
	$telefono2 = $_GET['txtTelefono2'];
	$observaciones = $_GET['txtInformacion'];
	$coordenates = $_GET['coords'];
	$tamañoTelefono = strlen(($telefono1)); 
	if ($tamañoTelefono != 8) {
		echo '<script language="javascript">';
		echo 'alert("El telefono debe tener 8 caracteres")';
		echo '</script>';
		header('location:../registro.html');

	}
	else{
		$sql = "INSERT INTO direccion (nombre_direccion, direccion_2, ciudad, departamento, telefono1, telefono2, observaciones, coordenada) VALUES ('$nombre_direccion', '$direccion2', '$ciudad', '$departamento', '$telefono1', '$telefono2', 	                    '$observaciones', '$coordenates')";
		$zeus = $mysqli->query($sql);
		
		$respuesta = $mysqli->query("SELECT * FROM direccion order by id_direccion desc limit 1");		
		$fila = mysqli_fetch_array($respuesta);
	    $id_direccion=$fila['id_direccion'];

		$sql2 = "INSERT INTO usuario (nombre, apellido, correo, password, fecha_nac, id_direccion) 
		 		VALUES ('$nombre', '$apellido', '$correo', '$password', '$fecha_nac', '$id_direccion')";
		
		$otherwer = $mysqli->query($sql2);
		
		mysqli_close($mysqli);
		header('location:login.php?correo='.$correo.'&password='.$password.'&coordenates='.$coordenates);
	}
?>

