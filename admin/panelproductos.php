<?php
require 'sql/ShowProduct.php';
require 'sql/Insertar_product_ropa.php';
require 'sql/Insertar_product_tecn.php';
require 'sql/Insertar_product_sb.php';
require 'sql/Insertar_product_dp.php';
require 'sql/Insertar_product_le.php';
require 'sql/Insertar_product_z.php';

session_start();
if($_SESSION['login'] == true){
    $name = $_SESSION['name'];
	$lastname = $_SESSION['lastname'];
}
else{
	session_unset();
    session_destroy();
    header('location: index.php');
}

if(isset($_POST['cerrar_sesion']))
        {
        session_start();
        session_destroy();
        header('location: index.php');
        }

$conexion2 = new mysqli("localhost", "root", "", "ecommerce");


// Invocando proceso de insercion
if(isset($_POST['save_product']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_ropa;		
		$Model->nombre = addslashes($_POST['nombre']);
		$Model->precio = addslashes($_POST['precio']);
		$Model->cantidad = addslashes($_POST['cantidad']);
		$Model->descripcion = addslashes($_POST['descripcion']);	
		$Model->peso = addslashes($_POST['peso']);
		$Model->modelo = addslashes($_POST['modelo']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}




	if(isset($_POST['save_productT']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_tecn;		
		$Model->nombre = addslashes($_POST['nombreT']);
		$Model->precio = addslashes($_POST['precioT']);
		$Model->cantidad = addslashes($_POST['cantidadT']);
		$Model->descripcion = addslashes($_POST['descripcionT']);	
		$Model->peso = addslashes($_POST['pesoT']);
		$Model->modelo = addslashes($_POST['modeloT']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}


		if(isset($_POST['save_productSB']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_sb;		
		$Model->nombre = addslashes($_POST['nombreSB']);
		$Model->precio = addslashes($_POST['precioSB']);
		$Model->cantidad = addslashes($_POST['cantidadSB']);
		$Model->descripcion = addslashes($_POST['descripcionSB']);	
		$Model->peso = addslashes($_POST['pesoSB']);
		$Model->modelo = addslashes($_POST['modeloSB']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}


		if(isset($_POST['save_productDP']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_dp;		
		$Model->nombre = addslashes($_POST['nombreDP']);
		$Model->precio = addslashes($_POST['precioDP']);
		$Model->cantidad = addslashes($_POST['cantidadDP']);
		$Model->descripcion = addslashes($_POST['descripcionDP']);	
		$Model->peso = addslashes($_POST['pesoDP']);
		$Model->modelo = addslashes($_POST['modeloDP']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}


	if(isset($_POST['save_productLE']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_le;		
		$Model->nombre = addslashes($_POST['nombreLE']);
		$Model->precio = addslashes($_POST['precioLE']);
		$Model->cantidad = addslashes($_POST['cantidadLE']);
		$Model->descripcion = addslashes($_POST['descripcionLE']);	
		$Model->peso = addslashes($_POST['pesoLE']);
		$Model->modelo = addslashes($_POST['modeloLE']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}


		if(isset($_POST['save_productZ']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_product_z;		
		$Model->nombre = addslashes($_POST['nombreZ']);
		$Model->precio = addslashes($_POST['precioZ']);
		$Model->cantidad = addslashes($_POST['cantidadZ']);
		$Model->descripcion = addslashes($_POST['descripcionZ']);	
		$Model->peso = addslashes($_POST['pesoZ']);
		$Model->modelo = addslashes($_POST['modeloZ']);	

		// Ejecutando insercion a la base de datos
		$Model->Insertar();
	}


if(isset($_POST['update_user']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Update_usuario;
		$Model->identificacion = addslashes($_POST['identity']);
		$Model->nombres = addslashes($_POST['name']);
		$Model->apellidos = addslashes($_POST['lastname']);
		$Model->nacimiento = addslashes($_POST['birtday']);
		$Model->domicilio = addslashes($_POST['home']);
		$Model->pais = addslashes($_POST['country']);
		$Model->tmp = addslashes($_POST['idcode']);
		$Model->Update();
	}


if(isset($_POST['show_product']))
{
    $model = new ShowProduct;
    $model->categoria = htmlspecialchars($_POST['catg_producto']);
    $model->Show();
}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Productos</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/miEstilo.css">
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">


</head>
<body>




	<div id="show_product" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Consultar productos</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">
							<table class="table table-striped table-hover"  id="tabla-usuarios">
					    		<thead>
						    		<tr>
						    			<th>Nombre</th>
						    			<th>Precio</th>
						    			<th>Cantidad</th>
						    			<th>Descripcion</th>
						    			<th>Peso</th>
						    			<th>Modelo</th>
						    		</tr>
						    		</thead>
					    		<tbody>
									<?php
									$sql = "SELECT * FROM productos";
								    $resultado = $conexion2->query($sql);
								    while($fila = $resultado->fetch_array())
								    {
								        echo "<tr>";
								        	echo "<td>".$fila['nombre']."</td>";
								        	echo "<td>".$fila['precio']."</td>";
								        	echo "<td>".$fila['cantidad']."</td>";
								        	echo "<td>".$fila['descripcion']."</td>";
								        	echo "<td>".$fila['peso']."</td>";
								        	echo "<td>".$fila['modelo']."</td>";
								        echo "<tr>";
								    }

									?>

					    		</tbody>
					    	</table>
						</div>
						</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->









	<div id="exit" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Informacion</h4>
						</div>
						<div class="modal-body">
							<h3>¿Cerrar sesion?</h3>
						</div>
						<div class="modal-footer">
							<form class="navbar-form navbar-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			            <input type="hidden" name="cerrar_sesion">
									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			            <button type="submit" class="btn btn-primary">Si</button>
			        </form>
						</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->






	<div id="new_product" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Selecciones Categoria</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">

								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_ropa">
							  		<span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Ropa
							 	</button>

								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_tecn">
							  		<span class="glyphicon glyphicon-object-align-bottom" aria-hidden="true"></span> Tecnologia
							 	</button>	


								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_sb">
							  		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Salud y Belleza
							 	</button>

							 	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_dp">
							  		<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Deportes
							 	</button>	

							 	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_le">
							  		<span class="glyphicon glyphicon-music" aria-hidden="true"></span> Libros y Entretiniemto
							 	</button>

							 	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product_z">
							  		<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Zapatos
							 	</button>							
									
							</div>
						</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



	<div id="new_product_ropa" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombre" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precio" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidad" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcion" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="peso" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modelo" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_product'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="new_product_tecn" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombreT" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precioT" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidadT" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcionT" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="pesoT" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modeloT" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_productT'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="new_product_sb" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombreSB" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precioSB" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidadSB" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcionSB" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="pesoSB" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modeloSB" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_productSB'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="new_product_dp" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombreDP" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precioDP" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidadDP" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcionDP" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="pesoDP" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modeloDP" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_productDP'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="new_product_le" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombreLE" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precioLE" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidadLE" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcionLE" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="pesoLE" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modeloLE" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_productLE'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="new_product_z" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Nuevo producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="nombreZ" class="form-control" id="txtNombre" placeholder="Nombre" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="precioZ" class="form-control" id="txtPrecio" placeholder="Precio" required>
									</div>		
								</div>
								<br>									
							
								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="cantidadZ" class="form-control" id="txtCantidad" placeholder="Cantidad" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="descripcionZ" class="form-control" id="txtDescripcion" placeholder="Descripcion" required>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="pesoZ" class="form-control" id="txtPeso" placeholder="Peso" required>
									</div>
									<div class="form-group col-sm-6 grid-margin">
										<input type="text" name="modeloZ" class="form-control" id="txtModelo" placeholder="Modelo" required>
									</div>
								</div>											

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='save_productZ'>
										<button type="submit" class="btn btn-success">Guardar</button>
									</div>
									</center>
								</div>
							</form>			
								
						</div>
					</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



	<!--Barra de navegacion -->
	<nav class="navbar  navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">HN Compras</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li >
				<a href="panelusuarios.php">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					Usuarios
				</a>
			</li>
			<li class="menu-activo">
				<a href="panelproductos.php">
				<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
					Productos
				</a>
			</li>
		</ul>
	      <ul class="nav navbar-nav navbar-right">

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	           <img class="small-profile-pic img-circle" src="img/userprofile.jpg"> <?php echo $name ." ". $lastname; ?> <span class="caret"></span></a>
	          <ul class="dropdown-menu">     
	            <li><a data-toggle="modal" data-target="#exit" >Cerrar sesión</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!--Fin de la barra de navegación-->


	<center>
	<!-- Inicio de contenido-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-5 grid-margin">
				<div class="panel panel-default panel-cuadrado">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>   Productos
					</div>
					<!--Inicio de panel izquierso -->
					<div class="panel-body">
					  	<div id="operaciones-proyectos">
					  		<div class="btn-group" role="group">
							  	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_product">
							  		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
							 	</button>
							 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reset_password">
							  		<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar
							 	</button>
							 	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reset_password">
							  		<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar
							 	</button>
							 	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#show_product">
							  		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Consultar
							 	</button>


							  	<!-- <button type="button" class="btn btn-default">
							    	<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Suspender
							  	</button> -->
							</div>
					  	</div>
					  	<br>
						    
					
					    
					</div>
				</div>
			</div>
		</div>
	</div>
</center>


	<script src="js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/datatables.js"></script>
	<script type="text/javascript" src="js/inicializador.js"></script>


</body>
</html>
