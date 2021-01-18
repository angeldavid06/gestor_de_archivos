$(document).ready(function() {
    $('.btn-guardar-categoria').click(function() {
        const cat = $('#nomCategoria').val();
        if (cat == "") {
            swal("Debes agregar el nombre de la categoría");
            return false;
        } else {
            $.ajax({
                type:"POST",
                data:$('#form-add-categorias').serialize(),
                url:"../procesos/categorias/agregar_categoria.php",
                success:function(r) {
                    r = r.trim();
                    if (r == 1) {
                        $('#tablaCategorias').load("modulos/tablaCategorias.php");
                        swal(":D","Agregado con exito","success");
                    } else {
                        console.log(r);
                        swal(":(","Fallo al agregar","error");
                    }
                }
            });
        }
    });
});