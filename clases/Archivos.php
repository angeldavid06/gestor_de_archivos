<?php 

    require_once "Conexion.php";

    class Archivos extends Conexion {
        public function agregar_archivo ($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_archivos (id_usuario,id_categoria,nombre,tipo,ruta) VALUES (?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisss',$datos[0],
                                        $datos[1],
                                        $datos[2],
                                        $datos[3],
                                        $datos[4]);
            $r = $query->execute();
            $query->close();
            return $r;
        }

        public function consultar_archivos ($id) {
            $conexion = Conexion::conectar();
            $sql = "SELECT t_archivos.id_archivo as id_archivo,
                            t_usuarios.id_usuario as id_usuario,
                            t_categorias.nombre as categoria,
                            t_archivos.nombre as archivo,
                            t_archivos.tipo as tipo,
                            t_archivos.ruta as ruta,
                            t_archivos.fecha as fecha
                    FROM t_archivos,t_usuarios,t_categorias
                    WHERE t_usuarios.id_usuario = '$id' AND t_usuarios.id_usuario = t_archivos.id_usuario AND t_categorias.id_categoria = t_archivos.id_categoria";
            return mysqli_query($conexion,$sql);
        }

        public function eliminar_archivo ($id) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$id);
            $r = $query->execute();
            $query->close();
            return $r;
        }

        public function obtener_nombre ($id) {
            $conexion = Conexion::conectar();
            $sql = "SELECT nombre FROM t_archivos WHERE id_archivo = '$id'";
            $result = mysqli_query($conexion,$sql);
            return mysqli_fetch_array($result)['nombre'];
        }
    
        public function obtener_ruta ($id) {
            $conexion = Conexion::conectar();
            $sql = "SELECT nombre,tipo FROM t_archivos WHERE id_archivo = '$id'";
            $result = mysqli_query($conexion,$sql);
            $datos = mysqli_fetch_array($result);
            $nombre = $datos['nombre'];
            $tipo = $datos['tipo'];
            return self::tipo_archivo($nombre,$tipo);
        }

        public function tipo_archivo ($nombre,$tipo) {
            $id = $_SESSION['id'];
            $ruta = '../archivos/'.$id.'/'.$nombre;
            switch ($tipo) {
                case 'png':
                    return '<img style="width:100%;" src="'.$ruta.'">';
                break;
                case 'jpg':
                    return '<img style="width:100%;" src="'.$ruta.'">';
                break;
                case 'svg':
                    return '<img style="width:100%;" src="'.$ruta.'">';
                break;
                case 'jpeg':
                    return '<img style="width:100%;" src="'.$ruta.'">';
                break;
                case 'pdf':
                    return '<embed src="'.$ruta.'" type="application/pdf" width="100%" height="600px"/>';
                break;
                case 'mp3':
                    return '<audio width="100%" controls src="'.$ruta.'"></audio>';
                break;
                case 'mp4':
                   return '<video width="100%" src="'.$ruta.'" controls></video>';
                break;
                default:
                    return '<p>Previsualización no disponible</p>';
                break;
            }
        }
    }

?>