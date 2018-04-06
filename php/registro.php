<?php 
	include 'conexion.php';

	$dia = $_GET['dia'];
	$mes = $_GET['mes'];
	$ano = $_GET['anio'];
	$fecha_nac=$ano."-".$mes."-".$dia;
	$indiceDepartamento = $_GET['departamento'];
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
	if($indiceDepartamento == 6){
	    $departamento = "Yoro";
	}
	if($indiceDepartamento == 7){
	    $departamento = "Valle";
	}
	if($indiceDepartamento == 8){
	    $departamento = "Atlántida";
	}
	if($indiceDepartamento == 9){
	    $departamento = "Lempira";
	}
    if($indiceDepartamento == 10){
	    $departamento = "La paz";
	}
    if($indiceDepartamento == 11){
	    $departamento = "El Paraíso";
	}
   if($indiceDepartamento == 12){
	    $departamento = "Intibucá";
	}
   if($indiceDepartamento == 13){
	    $departamento = "Gracias a Dios";
	}
    if($indiceDepartamento == 14){
	    $departamento = "Islas de la Bahía";
	}
	if($indiceDepartamento == 15){
	    $departamento = "Copán";
	}
    
    if($indiceDepartamento == 16){
	    $departamento = "Cólon";
	}
	if($indiceDepartamento == 17){
	    $departamento = "Ocotepeque";
	}
	if($indiceDepartamento == 18){
	    $departamento = "Santa Barbara";
	}
	$nombre = $_GET['usuario'];
	$apellido = $_GET['apellido'];
	$correo = $_GET['email'];
	$password= $_GET['contrasena'];
	$nombre_direccion = $_GET['direccion_1'];
	$direccion2 = $_GET['direccion_2'];
	$ciudad = $_GET['ciudad'];
	$telefono1 = $_GET['telefono_1'];
	$telefono2 = $_GET['telefono_2'];
	$observaciones = $_GET['observaciones'];
    $coordenates = $_GET['coordenada'];


    $sql1="SELECT correo FROM usuario WHERE correo='$correo' ";
    $result = $mysqli->query($sql1);

	$prueba= $result->num_rows;

	if($prueba>0){

		echo "1";
	}
	else
	{
	
		$sql = "INSERT INTO direccion (nombre_direccion, direccion_2, ciudad,coordenada ,departamento, telefono1, telefono2, observaciones) VALUES
		 ('$nombre_direccion', '$direccion2', '$ciudad', '$coordenates','$departamento', '$telefono1', '$telefono2','$observaciones')";
		
		$insert=$mysqli->query($sql);
		$last_id = $mysqli->insert_id;
		$id_direccion= $last_id;
		
	    
		$sql2 = "INSERT INTO usuario (nombre, apellido, correo, password, fecha_nac, id_direccion) 
		 		VALUES ('$nombre', '$apellido', '$correo', '$password', '$fecha_nac', '$id_direccion')";
		$insert=$mysqli->query($sql2);
		mysqli_close($mysqli);

		echo "2";
		}

?>
