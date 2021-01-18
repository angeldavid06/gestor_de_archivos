<?php 

    require_once "../../clases/Categorias.php";

    $obj = new Categorias();

    echo $obj->eliminar_categoria($_POST['id']);

?>