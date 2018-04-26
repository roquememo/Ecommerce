<?php


$target_dir = "../imagenes/productos/";
$target_file = $target_dir.basename($_FILES["imagen"]["name"]);
move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

?>