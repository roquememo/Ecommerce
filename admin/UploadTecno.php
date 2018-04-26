<?php

$target_dir = "../imagenes/productos/";

$target_fileT1 = $target_dir.basename($_FILES["picFileT1"]["name"]);
$urlT1 = "imagenes/productos/".basename($_FILES["picFileT1"]["name"]);
$principalT1 = 1;
move_uploaded_file($_FILES["picFileT1"]["tmp_name"], $target_fileT1);    

           
$nombre = $_POST['nombreT'];
$precio = $_POST['precioT'];
$cantidad = $_POST['cantidadT'];
$descripcion = $_POST['descripcionT'];
$peso = $_POST['pesoT'];
$modelo = $_POST['modeloT'];
$categoria = 2;                 


$conexion2 = new mysqli("localhost", "root", "", "ecommerce");

$sql = "INSERT INTO productos (nombre, precio, cantidad, descripcion, peso, modelo, id_categoria) VALUES ";
$sql .= "('".$nombre."', '".$precio."', '".$cantidad."', '".$descripcion."','".$peso."','".$modelo."','".$categoria."')";     
$resultado = $conexion2->query($sql);



$last_product = null;
$sql2 = "SELECT * FROM productos ORDER BY id_producto DESC LIMIT 1";
$resultado2 = $conexion2->query($sql2);
while($fila = $resultado2->fetch_array())
{ 
    $last_product = $fila['id_producto'];
} 


$sqlT1 = "INSERT INTO foto_producto (url, principal, id_producto) VALUES ";
$sqlT1 .= "('".$urlT1."', '".$principalT1."', '".$last_product."')";
$resultadoT1 = $conexion2->query($sqlT1);              
  
header('Location: ../admin/panelproductos.php');


?>