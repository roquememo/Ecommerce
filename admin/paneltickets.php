<?php
require 'sql/Insertar_admin.php';
require 'sql/resetpass.php';
require 'sql/update_ticket.php';

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




if(isset($_POST['reset_password_user']))
{
    $model = new resetpass;
    $model->username = htmlspecialchars($_POST['reset_tipo']);
    $model->password = htmlspecialchars($_POST['new_password']);
    $model->reset();

}

if(isset($_POST['consultar']))
{
	$tmp = $_POST['tipo_producto'];
}

if(isset($_POST['update_ticket_event']))
{
	// Empaquetando valores de los campos a guardar
	$Model = new update_ticket;
	$Model->gestion = addslashes($_POST['update_ticket_gestion']);
	$Model->asunto = addslashes($_POST['idcode']);	
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



	




	<div id="update_ticket" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ticket pendiente</h4>
					</div>
					<div class="modal-body">
						<div class="panel-body">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

								<?php 
								$sql4 = "SELECT * FROM tickets WHERE asunto='$tmp'";
							    $resultado4 = $conexion2->query($sql4);
							    while($fila4 = $resultado4->fetch_array())
							    {
							        
							        
							        echo "<div class='row'>";
							        	echo "<h3 class='col-md-3 control-label'>Asunto:</h3>";							        	
							        	echo "<input type='text' name='idcode' class='form-control' id='idcode' value='".$fila4['asunto']."' readonly>";
							        echo "</div>";

							        echo "<div class='row'>";
							        	echo "<h3 class='col-md-3 control-label'>Descripcion:</h3>";
							        	echo "<input type='text' name='ijnvfrtt' class='form-control' id='ijnvfrtt' value='".$fila4['descripcion']."' readonly>";
							        echo "</div>";

							         echo "<div class='row'>";
							        	echo "<h3 class='col-md-3 control-label'>Fecha:</h3>";							        	
							        	echo "<input type='text' name='ijnvfrre' class='form-control' id='ijnvfrre' value='".$fila4['fecha_apertura']."' readonly>";
							        echo "</div><br>";

							        echo "<div class='row'>";							        	
							        	echo "<div class='form-group col-sm-6 grid-margin'>";						        		
							        		echo "<textarea name='update_ticket_gestion' class='form-control' id='update_ticket_gestion' rows='10' cols='10' placeholder='Ingrese gestiones realizadas para brindar respuesta.'></textarea>";
							        	echo "</div>";
							        echo "</div>";

							        //SSecho "<label name='idcode'>".$fila4['asunto']."</label>";
							        $_POST['idcode'] = $tmp;

					
							    }
								?>				
									
								<div class="row">
									<input type='hidden' name='update_ticket_event'>
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar respuesta</button>
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
			<li>
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
			<li class="menu-activo">
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
						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>   Tickets Pendientes
					</div>
					<!--Inicio de panel izquierso -->
					<div class="panel-body">

					  	<br>
						    <h4>Listado de tickets pendientes por responder:</h4>
						<br><br>
					    <div>
					    
					    	<table class="table table-striped table-hover"  id="tabla-usuarios">
					    		<thead>
						    		<tr>
						    			<th>Asunto</th>
						    			<th>Descripcion</th>
						    			<th>Fecha de apertura</th>
						    		</tr>
						    		</thead>
					    		<tbody>
									<?php
									$sql = "SELECT * FROM tickets WHERE estado='PENDIENTE'";
								    $resultado = $conexion2->query($sql);
								    while($fila = $resultado->fetch_array())
								    {
								        echo "<tr>";
								        	echo "<td>".$fila['asunto']."</td>";
											echo "<td>".$fila['descripcion']."</td>";
											echo "<td>".$fila['fecha_apertura']."</td>";
								        echo "<tr>";
								    }

									?>

					    		</tbody>
					    	</table>
					    	<br>
					    	<form class="form-inline" method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
							    <h3>Responder tickets</h3>
							    <div class="input-control select">
								    <label for="user_password">Asunto:</label>
								    <select name="tipo_producto">
									    <?php
									    $sql = "SELECT * FROM tickets WHERE estado='PENDIENTE'";
									    $resultado = $conexion2->query($sql);
									    
									    while($fila = $resultado->fetch_array())
									    { 
									        echo "<option>".$fila['asunto']."</option>";
									    }    
									    ?>
								    </select>
							    </div>
							    <input type='hidden' name='consultar'>
								<button type="submit" class="btn btn-primary">Ampliar informacion</button>
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
										else{

									    $sql34 = "SELECT * FROM tickets WHERE asunto='$tmp'";
									  
									    $resultado34 = $conexion2->query($sql34);							    
									    while($fila = $resultado34->fetch_array())
									    { 	
									        echo "<div class='form-group'>";
									        	echo "<label class='col-md-3 control-label'>Asunto:</label>";
									        	echo "<p class='col-md-9 control-label'>".$fila['asunto']."</p>";
									        echo "</div>";

									        echo "<div class='form-group'>";
									        	echo "<label class='col-md-3 control-label'>Estado:</label>";
									        	echo "<p class='col-md-9 control-label'>".$fila['estado']."</p>";
									        echo "</div>";

									        echo "<div class='form-group'>";
									        	echo "<label class='col-md-3 control-label'>Descripcion:</label>";
									        	echo "<p class='col-md-9 control-label'>".$fila['descripcion']."</p>";
									        echo "</div>";

									        echo "<div class='form-group'>";
									        	echo "<label class='col-md-3 control-label'>Fecha de apertura:</label>";
									        	echo "<p class='col-md-9 control-label'>".$fila['fecha_apertura']."</p>";
									        echo "</div>";	   


									    } 

									    
		 								echo" <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update_ticket'>";
										  	 	echo "<span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Responder ticket</button><br><br>";


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
