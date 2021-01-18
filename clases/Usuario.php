<?php 

    require_once "Conexion.php";

    class Usuario extends Conexion {
        public function agregar_usuario ($datos) {
            $conexion = Conexion::conectar();
            
            if (self::buscar_usuario_repetido($datos[3])) {
                return 2;
            } else {

                $pass = self::pass_crypt($datos[4]);
                
                $sql = "INSERT INTO t_usuarios(nombre,fecha_nacimiento,email,usuario,password) VALUES (?,?,?,?,?)";
                
                $query = $conexion->prepare($sql);
                
                $query->bind_param('sssss', $datos[0],
                                            $datos[1],
                                            $datos[2],
                                            $datos[3],
                                            $pass);

                $r = $query->execute();
                $query->close();
    
                return $r;
            }
        }

        public function pass_crypt ($p) {
            $password = password_hash($p, PASSWORD_DEFAULT, ['cost' => 10]);
            return $password;
        }

        public function buscar_usuario_repetido ($usuario) {
            $sql = "SELECT usuario FROM t_usuarios WHERE usuario = '$usuario'";
            $datos = self::ejecutar_SQL_row($sql);
            return $datos;
        }

        public function iniciar_sesion ($datos) {
            $sql = "SELECT id_usuario,password FROM t_usuarios WHERE usuario = '$datos[0]'";
            $p = self::ejecutar_SQL_row($sql);
            if ($p[1] != '') {
                if (password_verify($datos[1],$p[1])) {
                    $_SESSION['usuario'] = $datos[0];
                    $_SESSION['id'] = $p[0];
                    return 1;
                } else {
                    return 3;
                }
            } else {
                return 0;
            }
        }

        public function ejecutar_SQL ($sql) {
            $conexion = Conexion::conectar();
            return mysqli_query($conexion,$sql);
        }

        public function ejecutar_SQL_row ($sql) {
            $conexion = Conexion::conectar();
            $result = mysqli_query($conexion,$sql);
            return mysqli_fetch_row($result);
        }
    }

?>