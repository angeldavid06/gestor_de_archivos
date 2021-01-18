<?php 

    require_once "../../clases/Categorias.php";

    $obj = new Categorias();

    echo json_encode($obj->obtener_categoria($_POST['id']));

?>