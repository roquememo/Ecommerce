<?php

$target_dir = "../imagenes/productos/";
$target_file = $target_dir.basename($_FILES["picFileDP"]["name"]);
$url = "imagenes/productos/".basename($_FILES["picFileDP"]["name"]);
$principal = 1;
move_uploaded_file($_FILES["picFileDP"]["tmp_name"], $target_file);               

           
$nombre = $_POST['nombreDP'];
$precio = $_POST['precioDP'];
$cantidad = $_POST['cantidadDP'];
$descripcion = $_POST['descripcionDP'];
$peso = $_POST['pesoDP'];
$modelo = $_POST['modeloDP'];
$categoria = 4;                 


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