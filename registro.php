<?php 

    session_start();
    if (isset($_SESSION['usuario'])) {
        header("Location: vistas/");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <?php require_once "dependencias.php"; ?>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Registro de usuario</h1>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="form-Registrar">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="">
                    <label for="correo">Email o correo electronico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required="">
                    <label for="nombreUsuario">Nombre de usuario:</label>
                    <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required="">
                    <label for="password">Constraseña:</label>
                    <input type="password" name="password" id="password" class="form-control" required="">
                    <br>
                    <button class="btn btn-primary">Registrar</button>
                    <a class="btn" href="index.php">Login</a>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script>
    </script>
</body>
</html>