<?php 
include 'conexion.php';
if (isset($_GET['consulta'])) {
	$eleccion=$_GET['consulta'];
	switch ($eleccion) {
		case 1:
			$consulta="SELECT * FROM categoria";
			$stmt = $mysqli->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['id']=$row[0];
				$con[$n]['nombre']=$row[1];
				$n++;
			}
			echo json_encode($con,JSON_UNESCAPED_UNICODE);
			$stmt->close();
			break;
//select url from foto_producto where id_producto = 1 and principal = 1
		case 2:
			$consulta="SELECT id_producto,nombre,precio FROM productos LIMIT 12";
			$stmt = $mysqli->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$consulta1="SELECT url FROM foto_producto WHERE id_producto = ".$row[0]." AND principal = 1";
				$stmt1 = $mysqli->query($consulta1);
				$row2=$stmt1->fetch_row();			
				$con[$n]['id']=$row[0];
				$con[$n]['nombre']=$row[1];
				$con[$n]['precio']=$row[2];
				$con[$n]['url']=$row2[0];
				$n++;
			}
			$stmt->close();
			$stmt1->close();
			$valor=json_encode($con,JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
			echo $valor;
			break;

		default:
			echo "No se encontro consulta";
			break;
	}
	$mysqli->close();
} else {
	echo "Sin funcion";
}



 ?>