<?php

    require_once "../../clases/Archivos.php";

    $obj = new Archivos();

    $id = $_SESSION['id'];
    $nombre = $obj->obtener_nombre($_POST['id']);

    $ruta = "../../archivos/".$id.'/'.$nombre;
    if (unlink($ruta)) {
        echo $obj->eliminar_archivo($_POST['id']);
    } else {
        echo 0;
    }
?>