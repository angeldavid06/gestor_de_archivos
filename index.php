<?php 

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <?php require_once "dependencias.php"; ?>
</head>
<body style="background-color: #e9ecef;">
    <?php require_once "modulos/header.php"; ?>
    <div class="jumbotron jumbotron-fluid" style="height: 80vh;display: flex;align-content:center;align-items:center;">
        <div class="container" style="display:flex;justify-content:space-between;">
            <div class="col-sm-5" style="max-width:50%;display: flex; justify-content: space-between; align-items:center;">
                <img style="width: 100%;" src="../public/img/add_file.svg" alt="">
            </div>
            <div class="col-sm-7">
                <h1 class="display-4">Gestor de archivos</h1>
                <p class="lead">Aquí podrás subir tus archivos favoritos, siempre y cuando sean del tipo png, jpg, pdf, mp3 y mp4.</p>
            </div>
        </div>
    </div>
</body>
</html>