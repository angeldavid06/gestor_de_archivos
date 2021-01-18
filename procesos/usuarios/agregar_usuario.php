<?php 

    require_once "../../clases/Usuario.php";

    $datos = array (
        $_POST['nombre'],
        $_POST['fechaNacimiento'],
        $_POST['correo'],
        $_POST['nombreUsuario'],
        $_POST['password']
    );

    $registrar = new Usuario();

    echo $registrar->agregar_usuario($datos);

?>