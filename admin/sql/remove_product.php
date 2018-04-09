<?php
//require 'Conexion.php';
class remove_product{
    
    public $name;
    
    public function remove(){
        
        $model = new Conexion;
        $conexion = $model->conectar();

        $sql = 'DELETE FROM productos WHERE nombre=:name_p';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':name_p', $this->name, PDO::PARAM_STR);
        $consulta->execute();

        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Producto eliminado!</strong> </div>";
      
    }
    
    
}

?>