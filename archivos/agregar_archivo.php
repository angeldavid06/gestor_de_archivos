<?php 

    require_once "../../clases/Archivos.php";

    $obj = new Archivos();

    $id_cat = $_POST['s_categoria'];
    $id_usu = $_SESSION['id'];
    $r = 0;

    if ($_FILES['archivos']['size'] > 0) {
        $carpeta = '../../archivos/'.$id_usu;

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        $totalArchivos = count($_FILES["archivos"]["name"]);
        for ($i=0; $i < $totalArchivos; $i++) { 
            $archivo = $_FILES['archivos']['name'][$i];
            $explode = explode('.',$archivo);
            $tipoArchivo = array_pop($explode);

            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
            $rutaFinal = $carpeta.'/'.$archivo;

            $datos_archivo = array (
                $id_usu,
                $id_cat,
                $archivo,
                $tipoArchivo,
                $rutaAlmacenamiento
            );

            if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
                $r = $obj->agregar_archivo($datos_archivo);
            }
        }
        echo $r;
    } else {
        echo 0;
    }

?>