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
			echo json_encode($con);
			$stmt->close();
			break;

		case 2:
			

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