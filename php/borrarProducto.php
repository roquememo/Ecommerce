<?php 

include 'conexion.php';
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$consulta="DELETE a
			FROM carrito_has_productos a
			INNER JOIN carrito b
  			ON a.id_carrito=b.id_carrito
			WHERE b.estado=1 and a.id_producto=".$id;
			$stmt = $mysqli->query($consulta);
	$mysqli->close();
	echo 'borrado';
}else{
	echo "error";
}


 ?>