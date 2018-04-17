<?php

include 'conexion.php';

$consultaBusqueda = $_POST['valorBusqueda'];

$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

$mensaje = "";


if (isset($consultaBusqueda)) {
	$consulta = mysqli_query($mysqli, "SELECT * FROM productos
	WHERE nombre LIKE '%$consultaBusqueda%' 
	OR modelo LIKE '%$consultaBusqueda%'
	OR CONCAT(nombre,' ',modelo) LIKE '%$consultaBusqueda%'
	");

	$filas = mysqli_num_rows($consulta);

	if ($filas === 0) {
		$mensaje = "<p>No hay ningún articulos relacionados</p>";
	} else {
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados['nombre'];
			$modelo = $resultados['modelo'];
			$Id = $resultados['id_producto'];

			//Output
			$mensaje .= '
			<td><li>
			<a href="productodetalles.html?id=' . $Id . '" >' . $nombre . '<br></a>
			</li></td>';

		};
	}; 

};
echo $mensaje;
?>