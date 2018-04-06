<?php 
session_start();
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
			if($id==0){
				$consulta="SELECT  id_producto,nombre,precio,descripcion FROM productos";
			}else{
				$consulta="SELECT  id_producto,nombre,precio,descripcion FROM productos where id_categoria=".$id;
			}
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
			}else{
				echo "No se envio id";
			}

			break;
		case 5:
		if (isset($_SESSION['id'])) {
			$id=$_SESSION['id'];
			$consulta="SELECT a.id_producto,a.cantidad,b.estado,c.nombre,c.precio,d.url FROM carrito_has_productos as a,carrito as b,productos as c,foto_producto as d WHERE (a.id_carrito=b.id_carrito) and (a.id_producto=c.id_producto) and (c.id_producto=d.id_producto) and b.estado=1 and d.principal=1 and b.id_usuario=".$id;
			$stmt = $mysqli->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {			
				$con[$n]['id_producto']=$row[0];
				$con[$n]['cantidad']=$row[1];
				$con[$n]['estado']=$row[2];
				$con[$n]['nombre']=$row[3];
				$con[$n]['precio']=$row[4];
				$con[$n]['url']=$row[5];
				$n++;
			}
			$stmt->close();
			if (isset($_GET['carrito'])) {
				echo $n;
			} else {
				$valor=json_encode($con,JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
				echo $valor;
			}
			
		}else{
			echo "0";
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