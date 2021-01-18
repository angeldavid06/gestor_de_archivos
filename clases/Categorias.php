<?php 
    require_once "Conexion.php";
    class Categorias extends Conexion {
        public function registrar_categoria ($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_categorias (id_usuario,nombre) VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('is',$datos[0],
                                    $datos[1]);
            $r = $query->execute();
            $query->close();
            return $r;
        }

        public function consultar_categorias () {
            $conexion = Conexion::conectar();
            $id = $_SESSION['id'];
            $sql = "SELECT id_categoria,nombre,fechaInsert FROM t_categorias WHERE id_usuario = '$id'";
            return mysqli_query($conexion,$sql);
        }

        public function eliminar_categoria ($id) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_categorias WHERE id_categoria = '$id'";
            return mysqli_query($conexion,$sql);
        }

        public function obtener_categoria ($id) {
            $conexion = Conexion::conectar();

            $sql = "SELECT * FROM t_categorias WHERE id_categoria = '$id'";

            $result = mysqli_query($conexion,$sql);
            
            $categorías = mysqli_fetch_array($result);

            $datos = array (
                "id_categoria" => $categorías['id_categoria'],
                "nombre_categoria" => $categorías['nombre']
            );

            return $datos;
        }

        public function actualizar_categoria ($datos) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_categorias SET nombre = '$datos[1]' WHERE id_categoria = '$datos[0]'";
            return mysqli_query($conexion,$sql);
        }
    }

?>