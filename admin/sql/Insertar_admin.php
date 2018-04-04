<?php

class Insertar_admin{
    public $nombre;
    public $apellido;
    public $correo;
    public $contrasena;
  
    public function Insertar(){
        
        $model = new Conexion();
        $conexion = $model->conectar();

        $sql = "INSERT INTO administrador (nombre, apellido, correo, password) VALUES ";
        $sql .= "(:name, :lastname, :email, :password)";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':name', $this->nombre); 
        $consulta->bindParam(':lastname', $this->apellido);
        $consulta->bindParam(':email', $this->correo);
        $consulta->bindParam(':password', $this->contrasena);     
        $consulta->execute();   

        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Usuario guardado!</strong> </div>";  
    }
}

?>




