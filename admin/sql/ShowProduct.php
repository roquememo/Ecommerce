<?php
require 'Conexion.php';

class ShowProduct{
    public $categoria;
    public $indice = 2;

    public function Show(){
        
        $model = new Conexion();
        $conexion = $model->conectar();

        $sql = "SELECT * FROM productos";
        
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':catg', $this->indice, PDO::PARAM_STR);     
        $consulta->$conexion->query($sql); 







         echo "<table class='table table-striped table-hover'  id='tabla-usuarios'>";
               echo "<thead>;
                        <tr>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                    <tbody>";
                        
                        //$sql = "SELECT * FROM administrador";
                        //$resultado = $conexion2->query($sql);
                        while($fila = $consulta->fetch_array())
                        {
                            echo "<tr>";
                                echo "<td>".$fila['nombre']."</td>";
                                //echo "<td>".$fila['apellido']."</td>";
                                //echo "<td>".$fila['correo']."</td>";
                            echo "<tr>";
                        }

                      

                    echo "</tbody>
                </table>";








    }
}

?>




