<?php 

    require_once "../../clases/Categorias.php";

    $datos = array (
        $_SESSION['id'],
        $_POST['nomCategoria']
    );

    $obj = new Categorias();

    echo $obj->registrar_categoria($datos); 

?>