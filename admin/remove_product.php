<?php
      
$temp = $_POST['remove_product_tipo'];
$value_product = null;               

$conexion2 = new mysqli("localhost", "root", "", "ecommerce");

$sql2 = "SELECT * FROM productos WHERE nombre='".$temp."'";
$resultado2 = $conexion2->query($sql2);
while($fila = $resultado2->fetch_array())
{ 
    $value_product = $fila['id_producto'];
} 

$sql3 = "DELETE FROM foto_producto WHERE id_producto='".$value_product."'";
$resultado3 = $conexion2->query($sql3);

$sql4 = "DELETE FROM productos WHERE id_producto='".$value_product."'";
$resultado4 = $conexion2->query($sql4);
 

header('Location: ../admin/panelproductos.php');


?>