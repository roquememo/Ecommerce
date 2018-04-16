<?php 
include 'conexion.php';
		if(isset($_GET['id'])){
			$idcompras=$_GET['id'];
			$consulta="SELECT a.fecha,a.monto,a.estado_envio,a.fecha_entrega,c.nombre,c.apellido,c.correo,
								d.coordenada,d.telefono1,d.ciudad 
								FROM compras as a,carrito as b,usuario as c,direccion as d 
								WHERE (a.id_carrito=b.id_carrito) and (b.id_usuario=c.id_usuario) and 
								(c.id_direccion=d.id_direccion) and a.id_compras=".$idcompras;
			$stmt = $mysqli->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {			
				$con[$n]['fecha']=$row[0];
				$con[$n]['monto']=$row[1];
				$con[$n]['estado_envio']=$row[2];
				$con[$n]['fecha_entrega']=$row[3];
				$con[$n]['nombre']=$row[4];
				$con[$n]['apellido']=$row[5];
				$con[$n]['correo']=$row[6];
				$con[$n]['coordenada']=$row[7];
				$con[$n]['telefono']=$row[8];
				$con[$n]['ciudad']=$row[9];
				$n++;
			}
			$stmt->close();
			$valor=json_encode($con,JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE);
			echo $valor;
		}else{
			echo 'id de compra desconocido';
		}	

 ?>
