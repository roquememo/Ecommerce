<?php
//require 'Conexion.php';
class update_product{
    public $nombre;
    public $precio;
    public $cantidad;
    public $descripcion;
    public $peso;
    public $modelo;  

  
    public function update(){
        
        $model = new Conexion();
        $conexion = $model->conectar();

        $sql = "UPDATE productos SET nombre=:name, precio=:price, cantidad=:cant, descripcion=:descrip, peso=:weight, modelo=:modelop WHERE nombre=:name";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':name', $this->nombre); 
        $consulta->bindParam(':price', $this->precio);
        $consulta->bindParam(':cant', $this->cantidad);
        $consulta->bindParam(':descrip', $this->descripcion);
        $consulta->bindParam(':weight', $this->peso);
        $consulta->bindParam(':modelop', $this->modelo);                
        $consulta->execute();  

        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Producto actualizado!</strong> </div>";   
    }
}

?>




