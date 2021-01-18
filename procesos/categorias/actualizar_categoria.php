<?php 

    require_once "../../clases/Categorias.php";

    $obj = new Categorias();

    $datos = array (
        $_POST['idA'],
        $_POST['nombreA']
    );

    echo $obj->actualizar_categoria($datos);

?>