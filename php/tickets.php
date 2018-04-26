<?php
//Archivo de conexión a la base de datos
session_start();
include 'conexion.php';

//$idUsuario = '';

//Variable de búsqueda
if(isset($_POST['op'])){
$op = $_POST['op'];
}
if(isset($_POST['asunto'])){
$asunto = $_POST['asunto'];
}
if(isset($_POST['descripcion'])){
$descripcion = $_POST['descripcion'];
}

$hoy = date('Y-m-d h:i:s');


switch ($op) {
	case 'guardar':
	if(isset($_SESSION['id'])){

	$idUsuario = $_SESSION['id'];
	$sql = "INSERT INTO tickets(asunto, estado, descripcion, fecha_apertura, id_usuario) VALUES('$asunto', 'PENDIENTE', '$descripcion', '$hoy', $idUsuario)";

	$consulta = mysqli_query($mysqli, $sql);


	}
		break;
	case 'cargar':

$mensaje = "";

if(isset($_SESSION['id'])){

$idUsuario = $_SESSION['id'];

	$consulta = mysqli_query($mysqli, "SELECT * FROM tickets WHERE id_usuario = $idUsuario");

	$filas = mysqli_num_rows($consulta);

	if ($filas == 0) {
		$mensaje = "<p>No hay ningún articulos relacionados</p>";
	} else {
		echo 'Tus tickets: <strong>'.$_SESSION['nombre'].'</strong>';

			$mensaje .= '
			<table class="table table-sm"><thead>
			<th scope="col">Asunto<th><br>
			<th scope="col">Descripcion<th><br>
			<th scope="col">Estado<th><br>
			<th scope="col">Fecha de Apertura<th><br>
			<th scope="col">Fecha de cierre<th><br>
			<th scope="col">Accion<th><br>
			</thead>';
		while($resultados = mysqli_fetch_array($consulta)) {
			$idtickets = $resultados['idTickets'];
			$asunto = $resultados['asunto'];
			$descripcion = $resultados['descripcion'];
			$estado = $resultados['estado'];
			$desde = $resultados['fecha_apertura'];			
			$hasta = $resultados['fecha_resolucion'];

			//Output
			$mensaje .= '
			<tbody>
			<tr>
			<td scope="col">' . $asunto . '<td><br>
			<td scope="col">' . $descripcion . '<td><br>
			<td scope="col">' . $estado . '<td><br>
			<td scope="col">' . $desde . '<td><br>
			<td scope="col">' . $hasta . '<td><br>
			<td scope="col"><a href="#" onclick="cerrarTicket('.$idtickets.');"> <i class="fa fa-times" aria-hidden="true"></i></a>
			<a href="#" onclick="ReabrirTicket('.$idtickets.');"> <i class="fa fa-check" aria-hidden="true"></i></a><td><br><td><br>			
			</tr>
			
			';

		};//Fin while $resultados
		$mensaje .= '</tbody></table>';

	}; //Fin else $filas
}
echo $mensaje;
		break;	

	case 'cerrar':
	if(isset($_SESSION['id'])){

	$idUsuario = $_SESSION['id'];
	$idTicket = $_POST['idTicket'];
	$sql = "UPDATE tickets SET estado = 'Cerrado', fecha_resolucion = '$hoy' WHERE idTickets = $idTicket AND id_usuario = $idUsuario";

	$consulta = mysqli_query($mysqli, $sql);


	}
		break;

	case 'reabrir':
	if(isset($_SESSION['id'])){

	$idUsuario = $_SESSION['id'];
	$idTicket = $_POST['idTicket'];
	$sql = "UPDATE tickets SET estado = 'Abierto', fecha_resolucion = '' WHERE idTickets = $idTicket AND id_usuario = $idUsuario";

	$consulta = mysqli_query($mysqli, $sql);


	}
		break;				
}
?>
