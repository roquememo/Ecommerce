<?php
//require 'Conexion.php';
class Insertar_product_z{
    public $nombre;
    public $precio;
    public $cantidad;
    public $descripcion;
    public $peso;
    public $modelo;
    public $categoria;
    public $temp = 6;

  
    public function Insertar(){
        
        $model = new Conexion();
        $conexion = $model->conectar();

        $sql = "INSERT INTO productos (nombre, precio, cantidad, descripcion, peso, modelo, id_categoria) VALUES ";
        $sql .= "(:name, :price, :cant, :descrip, :weight, :model, :idcatg)";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':name', $this->nombre); 
        $consulta->bindParam(':price', $this->precio);
        $consulta->bindParam(':cant', $this->cantidad);
        $consulta->bindParam(':descrip', $this->descripcion);
        $consulta->bindParam(':weight', $this->peso);
        $consulta->bindParam(':model', $this->modelo);
        $consulta->bindParam(':idcatg', $this->temp);             
        $consulta->execute();   


        echo "<div class='alert alert-success alert-dismissible' role='alert'>";
          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
          echo "<strong>¡Producto guardado!</strong> </div>";




    }
}

?>




