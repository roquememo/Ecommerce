<?php
require 'Conexion.php';
class resetpass{
    
    public $username;
    public $password;
    
    public function reset(){
        
        $model = new Conexion;
        $conexion = $model->conectar();

        $sql = 'UPDATE administrador SET password=:password WHERE correo=:username';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':password', $this->password, PDO::PARAM_STR);
        $consulta->bindParam(':username', $this->username, PDO::PARAM_STR);
        $consulta->execute();

        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Contraseña reestablecida!</strong> </div>";
      
    }
    
    
}

?>