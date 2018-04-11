<?php
require 'sql/ShowProduct.php';
require 'sql/Insertar_product_ropa.php';
require 'sql/Insertar_product_tecn.php';
require 'sql/Insertar_product_sb.php';
require 'sql/Insertar_product_dp.php';
require 'sql/Insertar_product_le.php';
require 'sql/Insertar_product_z.php';
require 'sql/remove_product.php';
require 'sql/update_product.php';

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
$tmp = null;


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


if(isset($_POST['delete_product_event']))
{
    $model = new remove_product;
    $model->name = htmlspecialchars($_POST['remove_product_tipo']);   
    $model->remove();
}


if(isset($_POST['consultar']))
{
	$tmp = $_POST['tipo_producto'];
}


if(isset($_POST['update_product_event']))
{
	// Empaquetando valores de los campos a guardar
	$Model = new update_product;
	$Model->nombre = addslashes($_POST['update_name_product']);
	$Model->precio = addslashes($_POST['update_price_product']);
	$Model->cantidad = addslashes($_POST['update_cant_product']);
	$Model->descripcion = addslashes($_POST['update_desc_product']);	
	$Model->peso = addslashes($_POST['update_peso_product']);
	$Model->modelo = addslashes($_POST['update_model_product']);
	$Model->update();
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


<div id="delete_product" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Eliminar producto</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<table class="mitabla">
										<tr>
											<td><label>Nombre de producto:</label></td>
											<td>
												<select name="remove_product_tipo">
											    <?php
											    $sql = "SELECT * FROM productos";
											    $resultado = $conexion2->query($sql);
											    
											    while($fila = $resultado->fetch_array())
											    { 
											        echo "<option>".$fila['nombre']."</option>";
											    }    
											    ?>
										    	</select>
										  	</td>
										</tr>
									</table>
								</div>
								<div class="row col-sm-6 col-sm-offset-3">
									<br><br>									
										<div class="form-group">
											<input type='hidden' name='delete_product_event'>
											<button type="submit" class="btn btn-danger">Eliminar</button>
										</div>									
								</div>
							</form>
							</div>
						</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div id="update_product_tmp" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Actualizacion de producto</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<label>Nombre</label>

								<?php 
								$sql4 = "SELECT * FROM productos WHERE nombre='$tmp'";
							    $resultado4 = $conexion2->query($sql4);
							    while($fila4 = $resultado4->fetch_array())
							    {
							        
							        echo "<div class='row'>";							        	
							        	echo "<div class='form-group col-sm-6 grid-margin'>";							        		
							        		echo "<input type='text' name='update_name_product' class='form-control' id='update_name_product' value='".$fila4['nombre']."'>";
							        	echo "</div>";
							        echo "</div>";

							        echo "<div class='row'>";
							        	echo "<div class='form-group col-sm-6 grid-margin'>";
							        		echo "<label>Precio</label>";
							        		echo "<input type='text' name='update_price_product' class='form-control' id='update_price_product' value='".$fila4['precio']."'>";
							        	echo "</div>";							        
							        echo "</div>";

							        echo "<div class='row'>";
							        	echo "<div class='form-group col-sm-6 grid-margin'>";
							        		echo "<label>Cantidad</label>";							        		
							        		echo "<input type='text' name='update_cant_product' class='form-control' id='update_cant_product' value='".$fila4['cantidad']."'>";
							        	echo "</div>";
							        echo "</div>";
							        	
							        echo "<div class='row'>";
							        	echo "<div class='form-group col-sm-6 grid-margin'>";
							        		echo "<label>Descripcion</label>";	        		
							        		echo "<input type='text' name='update_desc_product' class='form-control' id='update_desc_product' value='".$fila4['descripcion']."'>";
							        	echo "</div>";
							        echo "</div>";


							        echo "<div class='row'>";
							        	echo "<div class='form-group col-sm-6 grid-margin'>";
							        		echo "<label>Peso</label>";								        		
							        		echo "<input type='text' name='update_peso_product' class='form-control' id='update_peso_product' value='".$fila4['peso']."'>";
							        	echo "</div>";
							        echo "</div>";

							        echo "<div class='row'>";
							        	echo "<div class='form-group col-sm-6 grid-margin'>";
							        		echo "<label>Modelo</label>";								        		
							        		echo "<input type='text' name='update_model_product' class='form-control' id='update_model_product' value='".$fila4['modelo']."'>";
							        	echo "</div>";
							        echo "</div>";


							        //echo "<label name='idcode'>".$fila4['codUsuario']."</label>";
							        $_POST['idcode'] = $tmp;

					
							    }
								?>				

								<div class="row col-sm-6 col-sm-offset-3">
									<br>
									<center>
									<div class="form-group">
										<input type='hidden' name='update_product_event'>
										<button type="submit" class="btn btn-success">Actualizar</button>
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
			<li >
				<a href="paneltickets.php">
				<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
					Tickets
				</a>
			</li>
			<li>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exit">
			  		<span class="glyphicon glyphicon-logout" aria-hidden="true"></span> Cerrar Sesion
			 	</button>
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
							 	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_product">
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







    <form class="form-inline" method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
	  
	    <label>Selecciona un producto y realiza una consulta: </label>
	    <div class="input-control select">
		    <label for="user_password">Nombre de producto:</label>
		    <select name="tipo_producto">
			    <?php
			    $sql = "SELECT * FROM productos";
			    $resultado = $conexion2->query($sql);
			    
			    while($fila = $resultado->fetch_array())
			    { 
			        echo "<option>".$fila['nombre']."</option>";
			    }    
			    ?>
		    </select>
	    </div>
	    <input type='hidden' name='consultar'>
		<button type="submit" class="btn btn-primary">Consultar</button>
	    <br>
	    <br>
	    <!--<?php echo "<label>".$tmp."</label>" ?>-->

	</form>








			<div class="col-xs-12 col-lg-7 grid-margin">
					<div class="panel with-nav-tabs panel-default panel-cuadrado">
					  <div class="panel-heading">
					  	<!--<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Proyecto: Nombre de proyecto-->
  						<ul class="nav nav-tabs">  							
							<li class="active"><a  href="#1" data-toggle="tab">Datos generales</a></li>							
						</ul>
					  </div>
					  <div class="panel-body">
						<div class="tab-content ">
							<br>
							<!-- tab 1-->
							<div class="tab-pane active" id="1">
 								


								<?php

								if ($tmp == NULL){

								}
								else
								{

							    $sql34 = "SELECT * FROM productos WHERE nombre='$tmp'";
							  
							    $resultado34 = $conexion2->query($sql34);							    
							    while($fila = $resultado34->fetch_array())
							    { 	
							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Nombre:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['nombre']."</p>";
							        echo "</div>";

							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Precio:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['precio']."</p>";
							        echo "</div>";

							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Cantidad:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['cantidad']."</p>";
							        echo "</div>";

							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Descripcion:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['descripcion']."</p>";
							        echo "</div>";		

							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Peso:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['precio']."</p>";
							        echo "</div>";

							        echo "<div class='form-group'>";
							        	echo "<label class='col-md-3 control-label'>Modelo:</label>";
							        	echo "<p class='col-md-9 control-label'>".$fila['modelo']."</p>";
							        echo "</div>";	  

							    }

							    echo" <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update_product_tmp'>";
								echo "<span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Actualizar</button><br><br>";



								};
    
							    ?>

						    <hr><br><br>
							</div>
						</div>
					  </div>
					 </div>
			</div>

		</div>

	</div>






	<script src="js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/datatables.js"></script>
	<script type="text/javascript" src="js/inicializador.js"></script>


</body>
</html>
