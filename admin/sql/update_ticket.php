<?php
//require 'Conexion.php';
class update_ticket{
    public $gestion;
    public $asunto;
    public $status = 'RESUELTO';
      
    public function update(){
        
        $model = new Conexion();
        $conexion = $model->conectar();

        $sql = "UPDATE tickets SET gestion_realizada=:gest, estado=:new_status WHERE asunto=:asnt";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':gest', $this->gestion); 
        $consulta->bindParam(':new_status', $this->status);
        $consulta->bindParam(':asnt', $this->asunto);
                        
        $consulta->execute();  

        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Respuesta enviada!</strong> </div>";   
    }
}

?>




