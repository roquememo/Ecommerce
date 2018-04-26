<?php

$target_dir = "../imagenes/productos/";

$target_fileR1 = $target_dir.basename($_FILES["picFileR1"]["name"]);
$urlR1 = "imagenes/productos/".basename($_FILES["picFileR1"]["name"]);
$principalR1 = 1;
move_uploaded_file($_FILES["picFileR1"]["tmp_name"], $target_fileR1);

           
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$peso = $_POST['peso'];
$modelo = $_POST['modelo'];
$categoria = 1;                 


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


$sqlR1 = "INSERT INTO foto_producto (url, principal, id_producto) VALUES ";
$sqlR1 .= "('".$urlR1."', '".$principalR1."', '".$last_product."')";
$resultadoR1 = $conexion2->query($sqlR1);                
    

header('Location: ../admin/panelproductos.php');


?>