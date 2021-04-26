
function logear() {
    $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(),
        url: "Controlador/Index/login.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                window.location = "Vistas/VistaEspecifica/inicio.php";
            } else {
                Swal.fire("Error", "Eliga el Usuario Indicado", "error");

            }
        }
    })
    return false;
}