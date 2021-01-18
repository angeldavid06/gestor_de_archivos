<?php 

    require_once "../../clases/Usuario.php";

    $u = new Usuario();

    $datos = array (
        $_POST['usuario'],
        $_POST['password']
    );

    echo $u->iniciar_sesion($datos);
    
?>