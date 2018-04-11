<?php
	session_start();
	include 'conexion.php';
	include "codigoqr.php";
	if(isset($_GET['key'])){
		$key=$_GET['key'];
	}else{
		$key='';
	}
	$id=$_SESSION['id'];
	$consulta="SELECT a.id_producto,a.cantidad,b.estado,c.nombre,c.precio,d.url,b.id_carrito FROM carrito_has_productos as a,carrito as b,productos as c,foto_producto as d WHERE (a.id_carrito=b.id_carrito) and (a.id_producto=c.id_producto) and (c.id_producto=d.id_producto) and b.estado=1 and d.principal=1 and b.id_usuario=".$id;
	$stmt = $mysqli->query($consulta);
	$n=0;
	$monto=0;
	$con='';
	while ($row=$stmt->fetch_row()) {			
		$con=$con.$row[3].$row[1].$row[4];
		$monto=$monto+((int)$row[1]*(int)$row[4]);
		$n++;
		$id_carrito=$row[6];
	}
	$con=$con.$id;
	$key2=$key256=hash('sha256',$con);
	if($key==$key2){
		$estadoCarrito="UPDATE carrito 
						SET estado=0	
						WHERE id_carrito=".$id_carrito;
		$stmt1=$mysqli->query($estadoCarrito);
		$hoy = getdate();
		$dia=$hoy['mday'];
		$mes=$hoy['mon'];
		$anio=$hoy['year'];
		$actualdia=$dia;
		$actualmes=$mes;
		$actualanio=$anio;
		$tardanza=10;
		$dia=($dia+$tardanza);
		if (($mes==1)||($mes==3)||($mes==5)||($mes==7)||($mes==8)||($mes==10)||($mes==12)){if($dia>31){$dia=($dia-31);$mes=$mes+1;if($mes>12){$mes=1;$anio+1;}}}else{if ($mes==02){if($dia>28){$dia=($dia-28);$mes=$mes+1;}}else{if($dia>30){$dia=($dia-30);$mes=$mes+1;}}}	
		$insertCompra="INSERT INTO compras 
						(fecha, monto, estado_envio, fecha_entrega, id_carrito, qr, idMetodos_Pago)
						VALUES 
						(STR_TO_DATE('$actualmes/$actualdia/$actualanio','%m/%d/%Y'), '$monto', 'PENDIENTE', 
						STR_TO_DATE('$mes/$dia/$anio','%m/%d/%Y'), '$id_carrito', null , '1');";
			$stmt2 = $mysqli->query($insertCompra);
			$last_id = $mysqli->insert_id;
			$qr= new codigoqr($last_id);
			$imagen=$qr->getImagen();
		$qrurl="UPDATE compras
						SET qr='$imagen'
						WHERE id_compras=".$last_id;
		$stmt3=$mysqli->query($qrurl);
		echo 'compra exitosa </br> <a href="../index.html">regresar</a> </br> ';
		$qr->verCodigo();
		echo $qr->getdatos();
	}else{
		echo 'ocurrio un error </br> <a href="../index.html">regresar</a>';
	}
?>