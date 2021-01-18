<?php 
    session_start();
    class Conexion {
        public function conectar () {
            $conexion = mysqli_connect(
                'localhost',
                'root',
                '',
                'gestor'
            );
            return $conexion;
        }
    }

?>