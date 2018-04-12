<?php
require 'sql/loginuser.php';
$mensaje = null;

if(isset($_POST['login'])){
    $valid_user = $_POST['username'];
    $valid_pass = $_POST['password']; 

    $var = new loginuser;
    $var->username = htmlspecialchars($_POST['username']);
    $var->password = htmlspecialchars($_POST['password']);
	$var->login();
	$mensaje = $var->mensaje;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HN Compras</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/miEstilo.css">

</head>
<body class="body">

  <div class="header-inicio">
      <br>
      <div class="container">
        <!--Cajita del login -->
        <br>
        <div class="row-login">
          <div class="panel panel-default">
            <div class="panel-body">
            <center>
              <h4>Administración de HN Compras</h4>
              <?php echo "<h2>$mensaje</h2>" ?>
              <br>
              <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="admin@admin.com">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="admin">
                  </div>
                  <input type='hidden' name='login'>
                  <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                  <br><br>
                  <a href="#"><small>Reestablecer mi contraseña</small></a>

              </form>
              <hr>              
            </center>
            <br>
            </div>
          </div>
        </div>

      </div>
  </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
