$(document).ready(function() {
    $('#form-login').on('submit',function(evt) {
        evt.preventDefault();
        datos = $(this).serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"procesos/usuarios/iniciar.php",
            success:function(r) {
                r = r.trim();
                if (r == 1) {
                    window.location.href = 'vistas/';
                } else if (r == 3) {
                    swal(":(","Contraseña incorrecta","error");
                } else {
                    console.log(r);
                    swal(":(","Fallo el inicio de sesión","error");
                }
            }
        });
    });
});