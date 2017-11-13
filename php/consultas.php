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

		case 2:
			$consulta="SELECT id_producto,nombre,precio,descripcion FROM productos order by id_producto desc LIMIT 12";
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
				$con[$n]['descripcion']=$row[3];
				$con[$n]['url']=$row2[0];
				$n++;
			}
			$stmt->close();
			$stmt1->close();
			$valor=json_encode($con,JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
			echo $valor;
			break;

		case 3:
			if (isset($_GET['id'])) {
			$id=$_GET['id'];
			$consulta="SELECT nombre,precio,cantidad,descripcion,peso,modelo FROM productos where id_producto=".$id;
			$stmt = $mysqli->query($consulta);
			$con=array();
			$row=$stmt->fetch_row();
			$con['nombre']=$row[0];
			$con['precio']=$row[1];
			$con['cantidad']=$row[2];
			$con['descripcion']=$row[3];
			$con['peso']=$row[4];
			$con['modelo']=$row[5];
			$consulta1="SELECT url FROM foto_producto WHERE id_producto = ".$id." order by principal";
			$stmt1 = $mysqli->query($consulta1);
			$n=0;
			while($row2=$stmt1->fetch_row()){			
				$con['url'.$n]=$row2[0];
				$n++;
			}

			$stmt->close();
			$stmt1->close();
			$valor=json_encode($con,JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
			echo $valor;

			}else{
				echo "No se envio id";
			}
			break;

		case 4:

			if (isset($_GET['cate'])) {
			$id=$_GET['cate'];
			$consulta="SELECT  id_producto,nombre,precio FROM productos where id_categoria=".$id;
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
			}else{
				echo "No se envio id";
			}

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