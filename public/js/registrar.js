$(document).ready(function() {
    $('#form-Registrar').on('submit', function(evt) {
        evt.preventDefault();
        datos = $(this).serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"procesos/usuarios/agregar_usuario.php",
            success:function(r) {
                r = r.trim();
                if (r == 1) {
                    swal(":D","Agregado con exito","success");
                    $('#form-Registrar')[0].reset();
                } else if (r == 2) {
                    swal(":(","Este usuario ya existe","error");
                } else {
                    console.log(r);
                    swal(":(","Fallo al agregar","error");
                }
            }
        });
    });
});