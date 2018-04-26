<?php

$target_dir = "../imagenes/productos/";
$target_file = $target_dir.basename($_FILES["picFileSB"]["name"]);
$url = "imagenes/productos/".basename($_FILES["picFileSB"]["name"]);
$principal = 1;
move_uploaded_file($_FILES["picFileSB"]["tmp_name"], $target_file);               

           
$nombre = $_POST['nombreSB'];
$precio = $_POST['precioSB'];
$cantidad = $_POST['cantidadSB'];
$descripcion = $_POST['descripcionSB'];
$peso = $_POST['pesoSB'];
$modelo = $_POST['modeloSB'];
$categoria = 3;                 


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


$sql3 = "INSERT INTO foto_producto (url, principal, id_producto) VALUES ";
$sql3 .= "('".$url."', '".$principal."', '".$last_product."')";
$resultado3 = $conexion2->query($sql3);

header('Location: ../admin/panelproductos.php');


?>