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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="public/css/login.css">
    <?php require_once "dependencias.php"; ?>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="public/img/folder.png" id="icon" alt="User Icon" />
                <h1>Iniciar Sesión</h1>
            </div>

            <!-- Login Form -->
            <form id="form-login">
                <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="username" required="">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="registro.php">Registrar</a>
            </div>
        </div>
    </div>
</body>
</html>