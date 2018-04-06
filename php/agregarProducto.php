<?php
	include 'conexion.php';
	session_start();
	$id_producto = $_GET['id'];
	$id_user=$_SESSION['id'];
		if($_GET['cantidad']<=0){
			$cantidad=1;
		}else{
			$cantidad=$_GET['cantidad'];
		}	
	$consulta="SELECT * FROM carrito WHERE estado=1 and id_usuario='".$id_user."'";
	$stmt = $mysqli->query($consulta);
	if($row=mysqli_fetch_array($stmt)){
		$id_carrito=$row['id_carrito'];
		$duplicado="SELECT * FROM carrito_has_productos as a, carrito as b where (a.id_carrito=b.id_carrito) and b.estado=1 and id_producto=".$id_producto;
		$stmt4 = $mysqli->query($duplicado);
		if($row=mysqli_fetch_array($stmt4)){
			$aumentar="UPDATE carrito_has_productos a,carrito b 
						SET a.cantidad=a.cantidad+'$cantidad'
						WHERE a.id_carrito=b.id_carrito 
						and b.estado=1 and a.id_producto=".$id_producto;
			$stmt5=$mysqli->query($aumentar);
		}else{
			$consulta1="INSERT INTO carrito_has_productos (id_carrito, id_producto, cantidad) 
		 		VALUES ('$id_carrito', '$id_producto', '$cantidad')";
			$stmt1 = $mysqli->query($consulta1);
			echo 'hay un carrito';
		}
	}
	else{
		$consulta2="INSERT INTO carrito (id_carrito,estado,id_usuario) VALUES (null,1,'$id_user')";
		$stmt2 = $mysqli->query($consulta2);
		$last_id = $mysqli->insert_id;
		$consulta3="INSERT INTO carrito_has_productos (id_carrito, id_producto, cantidad) 
		 		VALUES ('$last_id', '$id_producto', '$cantidad')";
		$stmt3 = $mysqli->query($consulta3);
		echo 'no hay carrito';
	}
	$mysqli->close();

 ?>