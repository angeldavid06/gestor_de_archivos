<?php 

    require_once "../../clases/Categorias.php";

    $obj = new Categorias();

    $mostrar = $obj->consultar_categorias();

?>

<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover table-dark" id="datatableCategorias">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mostrar as $key):?>
                    <tr>
                        <td><?php echo $key['nombre']; ?></td>
                        <td><?php echo $key['fechaInsert']; ?></td>
                        <td>
                            <button  data-toggle="modal" data-target="#obtener_categoria" onclick="obtener_categoria(<?php echo $key['id_categoria'] ?>)"  class="fas fa-edit btn btn-warning"></button>
                        </td>
                        <td>
                            <button onclick="eliminar_categoria(<?php echo $key['id_categoria'] ?>)" class="fas fa-trash btn btn-danger"></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
         $('#datatableCategorias').DataTable();
    });

    function eliminar_categoria(id) {
        swal({
            title: "¿Estas seguro de eliminar esta categoría?",
            text: "Una vez eliminada, no podrá recuperarse",
            icon:"warning",
            buttons:true,
            dangerMode:true,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    type:"POST",
                    data:"id="+id,
                    url:"../procesos/categorias/eliminar_categoria.php",
                    success:function(r) {
                        r = r.trim();
                        if (r == 1) {
                            $('#tablaCategorias').load("modulos/tablaCategorias.php");
                            swal("Eliminado con exito", {
                                icon:"success",
                            });
                        } else {
                            console.log(r);
                            swal(":(","Fallo al eliminar","error");
                        }
                    }
                });
            }
        })
        return false;
    }
</script>