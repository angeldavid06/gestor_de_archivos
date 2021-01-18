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
    <title>Gestor</title>
    <?php require_once "dependencias.php"; ?>
</head>
<body style="background-color: #e9ecef;">
    <?php require_once "modulos/header.php"; ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="max-width:100%;display: flex; justify-content: space-between; align-items:center;">
                    <h1 class="display-4">Gestor de archivos</h1>
                    <button data-toggle="modal" data-target="#agregarArchivo" class="btn btn-primary">
                        <span class="fas fa-plus-circle"></span>Agregar archivos
                    </button>
                </div>
            </div>
            <hr>
            <div id="tablaGestor"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="agregarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-agregar_archivo" method="POST" enctype="multipart/form-data">
                    <label>Categoria</label>
                    <div id="categoriasLoad"></div>
                    <label for="">Selecciona un archivo</label>
                    <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-guardar-archivos">Guardar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="archivo_obtenido">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#tablaGestor').load("modulos/tablaGestor.php");
            $('#categoriasLoad').load("modulos/select_categorias.php");
            
            $('.btn-guardar-archivos').click(function() {
                var datos = new FormData(document.getElementById('form-agregar_archivo'));
                $.ajax({
                    url:"../procesos/archivos/agregar_archivo.php",
                    type:"POST",
                    datatype:"html",
                    data:datos,
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(r){
                        if (r == 1) {
                            $("#form-agregar_archivo")[0].reset();
                            $('#tablaGestor').load("modulos/tablaGestor.php");
                            swal(":D","Agregado con exito","success");
                        } else {
                            swal(":(","Fallo al agregar","error");
                        }
                    }
                });
            });
        });

        function eliminar_archivo(id) {
            swal({
                title:"¿Estas seguro de eliminar este archivo?",
                text:"El archivo será eliminado permanentemente",
                icon:"warning",
                button: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:"POST",
                        data:"id="+id,
                        url:"../procesos/archivos/eliminar_archivo.php",
                        success:function(r) {
                            if (r == 1) {
                                $('#tablaGestor').load("modulos/tablaGestor.php");
                                swal(":D","Eliminado con exito","success");
                            } else {
                                swal(":(","Error al eliminar","error");
                            }
                        }
                    });
                }
            });
        }

        function obtener_archivo (id) {
            $.ajax({
                type:"POST",
                data:"id="+id,
                url:"../procesos/archivos/visualizar_archivo.php",
                success:function(r) {
                    $('#archivo_obtenido').html(r);
                }
            });
        }
    </script>
</body>
</html>