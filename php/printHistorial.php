<?php

include('libreria/mpdf60/mpdf.php');
include 'conexion.php';

//CARGAR VARIABLES
$idCarrito = $_REQUEST['idCarrito'];



$consulta = mysqli_query($mysqli, "SELECT productos.nombre, productos.precio, productos.descripcion FROM carrito_has_productos INNER JOIN productos ON carrito_has_productos.id_producto = productos.id_producto WHERE carrito_has_productos.id_carrito = $idCarrito ");

	$filas = mysqli_num_rows($consulta);


		$html .= '
		<table class="table table-sm"><thead>
		<th scope="col">Nombre<th><br>
		<th scope="col">Precio<th><br>
		<th scope="col">Descripcion<th><br>
		</thead>';
	while($resultados = mysqli_fetch_array($consulta)) {
		$asunto = $resultados['nombre'];
		$descripcion = $resultados['precio'];
		$estado = $resultados['descripcion'];			

		//Output
		$html .= '
		<tbody>
		<tr>
		<td scope="col">' . $asunto . '<td><br>
		<td scope="col">' . $descripcion . '<td><br>
		<td scope="col">' . $estado . '<td><br>
		</tr>
		
		';

	};//Fin while $resultados
	$html .= '</tbody></table>';





$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();

?>