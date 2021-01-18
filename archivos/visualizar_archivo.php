<?php 

    require_once "../../clases/Archivos.php";

    $obj = new Archivos();

    echo $obj->obtener_ruta($_POST['id']);
?>