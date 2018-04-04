<?php
require 'sql/Insertar_admin.php';
require 'sql/resetpass.php';

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
if(isset($_POST['save_user']))
	{
		// Empaquetando valores de los campos a guardar
		$Model = new Insertar_admin;		
		$Model->nombre = addslashes($_POST['nombre']);
		$Model->apellido = addslashes($_POST['apellido']);
		$Model->correo = addslashes($_POST['correo']);
		$Model->contrasena = addslashes($_POST['contrasena']);	

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




if(isset($_POST['reset_password_user']))
{
    $model = new resetpass;
    $model->username = htmlspecialchars($_POST['reset_tipo']);
    $model->password = htmlspecialchars($_POST['new_password']);
    $model->reset();

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
	<title>Administradores</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/miEstilo.css">
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">


</head>
<body>




	<div id="reset_password" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Reestablecer contraseña</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<div class="row">
									<table class="mitabla">
										<tr>
											<td><label>Nombre de usuario:</label></td>
											<td>
												<select name="reset_tipo">
											    <?php
											    $sql = "SELECT * FROM administrador";
											    $resultado = $conexion2->query($sql);
											    
											    while($fila = $resultado->fetch_array())
											    { 
											        echo "<option>".$fila['correo']."</option>";
											    }    
											    ?>
										    	</select>
										  	</td>
										</tr>
										<tr>
											<td><label>Nueva contraseña:</label></td>
											<td><input type="password" name="new_password" class="form-control" placeholder="Contraseña"></td>
										</tr>
									</table>
								</div>
								<div class="row col-sm-6 col-sm-offset-3">
									<br><br>
									<center>
										<div class="form-group">
											<input type='hidden' name='reset_password_user'>
											<button type="submit" class="btn btn-success">Aplicar cambios</button>
										</div>
									</center>
								</div>
							</form>
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



	<div id="new_user" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Nuevo administrador</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">
								<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

									<h3>Información personal</h3>
									<div class="row">
										<div class="form-group col-sm-6 grid-margin">
											<input type="text" name="nombre" class="form-control" id="txtNombre" placeholder="Nombre" required>
										</div>
										<div class="form-group col-sm-6 grid-margin">
											<input type="text" name="apellido" class="form-control" id="txtApellido" placeholder="Apellido" required>
										</div>		
									</div>
									<br>
									
									<h3>Credenciales para acceso</h3>
									<div class="row">
										<div class="form-group col-sm-6 grid-margin">
											<input type="email" name="correo" class="form-control" id="txtEmail" placeholder="Correo" required>
										</div>
										<div class="form-group col-sm-6 grid-margin">
											<input type="password" name="contrasena" class="form-control" id="txtPassword" placeholder="Contraseña" required>
										</div>
									</div>
									<br>											

									<div class="row col-sm-6 col-sm-offset-3">
										<br>
										<center>
										<div class="form-group">
											<input type='hidden' name='save_user'>
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
			<li class="menu-activo">
				<a href="panelusuarios.php">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					Usuarios
				</a>
			</li>
			<li >
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
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>   Administradores
					</div>
					<!--Inicio de panel izquierso -->
					<div class="panel-body">
					  	<div id="operaciones-proyectos">
					  		<div class="btn-group" role="group">
							  	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new_user">
							  		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar administrador
							 	</button>
							 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reset_password">
							  		<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar contraseña
							 	</button>

							  	<!-- <button type="button" class="btn btn-default">
							    	<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Suspender
							  	</button> -->
							</div>
					  	</div>
					  	<br>
						    <h4>Listado de administradores actuales para la plataforma:</h4>
						<br><br>
					    <div>
					    
					    	<table class="table table-striped table-hover"  id="tabla-usuarios">
					    		<thead>
						    		<tr>
						    			<th>Nombre</th>
						    			<th>Apellido</th>
						    			<th>Correo</th>
						    		</tr>
						    		</thead>
					    		<tbody>
									<?php
									$sql = "SELECT * FROM administrador";
								    $resultado = $conexion2->query($sql);
								    while($fila = $resultado->fetch_array())
								    {
								        echo "<tr>";
								        	echo "<td>".$fila['nombre']."</td>";
											echo "<td>".$fila['apellido']."</td>";
											echo "<td>".$fila['correo']."</td>";
								        echo "<tr>";
								    }

									?>

					    		</tbody>
					    	</table>

					    </div>
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
