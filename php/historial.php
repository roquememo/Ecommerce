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

	case 'cargar':

$mensaje = "";

if(isset($_SESSION['id'])){

$idUsuario = $_SESSION['id'];

	$consulta = mysqli_query($mysqli, "SELECT * FROM compras
										INNER JOIN carrito ON compras.id_carrito = carrito.id_carrito WHERE carrito.id_usuario = $idUsuario");

	$filas = mysqli_num_rows($consulta);

	if ($filas == 0) {
		$mensaje = "<p>No hay ningún articulos relacionados</p>";
	} else {
		echo 'Tus tickets: <strong>'.$_SESSION['nombre'].'</strong>';

			$mensaje .= '
			<table class="table table-sm"><thead>
			<th scope="col">Fecha<th><br>
			<th scope="col">Monto<th><br>
			<th scope="col">Estado de Envío<th><br>
			<th scope="col">Fecha de Entrega<th><br>
			</thead>';
		while($resultados = mysqli_fetch_array($consulta)) {
			$asunto = $resultados['fecha'];
			$descripcion = $resultados['monto'];
			$estado = $resultados['estado_envio'];
			$desde = $resultados['fecha_entrega'];			

			//Output
			$mensaje .= '
			<tbody>
			<tr>
			<td scope="col">' . $asunto . '<td><br>
			<td scope="col">' . $descripcion . '<td><br>
			<td scope="col">' . $estado . '<td><br>
			<td scope="col">' . $desde . '<td><br>
			<td scope="col">' . $hasta . '<td><br>			
			</tr>
			
			';

		};//Fin while $resultados
		$mensaje .= '</tbody></table>';

	}; //Fin else $filas
}
echo $mensaje;
		break;	

		
}
?>
