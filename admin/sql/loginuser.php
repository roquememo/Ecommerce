<?php
require 'Conexion.php';

class loginuser{

    public $username;
    public $password;
    public $mensaje;

    public function login(){

        $model = new Conexion;
        $conexion = $model->conectar();
        $sql = 'SELECT * FROM administrador WHERE correo=:username AND password=:password';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':username', $this->username, PDO::PARAM_STR);
        $consulta->bindParam(':password', $this->password, PDO::PARAM_STR);
        $consulta->execute();
        $total = $consulta->rowCount();

        if($total == 0)
            {
                $this->mensaje = 'Error al iniciar sesion, datos incorrectos :(';
            }
        else
            {
                $fila = $consulta->fetch();
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['name'] = $fila['nombre'];
                $_SESSION['lastname'] = $fila['apellido'];                
                header('location: panelusuarios.php');            
            }
    }
}
?>
