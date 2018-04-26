<?php


                $target_dir = "../imagenes/productos/";
                $target_file = $target_dir.basename($_FILES["picFile"]["name"]);
                move_uploaded_file($_FILES["picFile"]["tmp_name"], $target_file);
                /*
                $url = "docs/".basename($_FILES["picFile"]["name"]);
                $cat = 1;
                           
                // // Check if image file is a actual image or fake image          
               
               
                //si todo está bien con el archivo, entonces hay que revisar los datos para la base  
                if(isset($_POST['nombre'])){
                    $sql = "INSERT INTO productos (nombre, precio, cantidad, descripcion, peso, modelo, id_categoria) VALUES "
                                ."('".$_POST['nombre']."','".$_POST['precio']."','".$_POST['cantidad']."','".$_POST['descripcion']."','".$_POST['peso']."','".$_POST['modelo']."','".$cat."')";

                    
                    $conexion2 = new mysqli("localhost", "root", "", "ecommerce");
                    $resultado = $conexion2->query($sql);




                    


                    $resultado = $miConexion->ejecutarInstruccion($consulta);
                    if ($resultado) {       
                        echo "se registro exitosamente";
                    }else
                        echo "No se pudo registrar.".$consulta;
                    $miConexion->cerrarConexion();   
                    //luego se procede a guargar el elemento
                    if (move_uploaded_file($_FILES["docFile"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["docFile"]["name"]). " has been uploaded.";
                        echo "<script>alert('Documento Guardado con exito.');</script>";
                        header('Location: ../documentos.html');
                    } else {
                        echo "<script>alert('El documento no puedo guardarse');</script>";
                        header('Location: ../documentos.html');
                    }    
                }else
                    echo "el titulo no esta definido";                    
                
            */

?>