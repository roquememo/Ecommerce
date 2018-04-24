<?php 
include 'conexion.php';



	$nombre = $_GET['usuario'];
	$apellido = $_GET['apellido'];
	$correo = $_GET['email'];
	$password = $_GET['contrasena'];
	$nombre_direccion = $_GET['direccion_1'];
	$direccion2 = $_GET['direccion_2'];
	$ciudad = $_GET['ciudad'];
	$telefono1 = $_GET['telefono_1'];
	$telefono2 = $_GET['telefono_2'];
	$observaciones = $_GET['observaciones'];
    $dpt=$_GET['departamento'];    
    
$actualizar=  " UPDATE usuario A
            INNER JOIN direccion B ON A.id_direccion =B.id_direccion
            
            SET A.nombre='$nombre',A.apellido='$apellido' ,A.correo='$correo',A.password=md5('$password'),
            B.nombre_direccion='$nombre_direccion',B.direccion_2='$direccion2' ,B.ciudad='$ciudad' ,
            B.telefono1='$telefono1',B.telefono2='$telefono2',B.observaciones='$observaciones',B.departamento='$dpt'
            WHERE A.correo= '$correo' ";

$result=$mysqli->query($actualizar);
echo "1"

 ?>