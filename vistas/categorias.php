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
    <title>Categorías</title>
    <?php require_once "dependencias.php"; ?>
</head>
<body style="background-color: #e9ecef;">
    <?php require_once "modulos/header.php"; ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="max-width:100%;display: flex; justify-content: space-between; align-items:center;">
                    <h1 class="display-4">Categorías</h1>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal"><span class="fas fa-plus-circle"></span>Añadir nueva categoría</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-add-categorias">
                        <label for="">Nombre de la categoría:</label>
                        <input type="text" name="nomCategoria" id="nomCategoria" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn-guardar-categoria btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="obtener_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-actualizar-categoria">
                    <input type="text" name="idA" id="idA" hidden="">
                    <label>Nombre</label>
                    <input type="text" name="nombreA" id="nombreA" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" onclick="actualizar_categoria()">Actualizar</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#tablaCategorias').load("modulos/tablaCategorias.php");
        });

        function obtener_categoria(id) {
            $.ajax({
                type:"POST",
                data:"id="+id,
                url:"../procesos/categorias/obtener_categoria.php",
                success:function(r) {
                    r = jQuery.parseJSON(r);
                    $("#idA").val(r['id_categoria']);
                    $("#nombreA").val(r['nombre_categoria']);
                }
            });
        }

        function actualizar_categoria () {
            if ($('#idA').val() == '') {
                swal("No hay categoría");
                return false;
            } else {
                $.ajax({
                    type:"POST",
                    data:$("#form-actualizar-categoria").serialize(),
                    url:"../procesos/categorias/actualizar_categoria.php",
                    success:function(r) {
                        if (r == 1) {
                            $('#tablaCategorias').load("modulos/tablaCategorias.php");
                            swal(":D","Actualizado con exito","success");
                        } else {
                            console.log(r);
                            swal(":(","Fallo al actualizar","error");
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>