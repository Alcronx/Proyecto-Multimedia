$(document).ready(function () { //Este javascript se ejecuta cuando el documento Cargo
    $('#listadoCarpetas').load("../ListaArchivos/cargarCarpetas.php"); //Carga las Carpetas en el div listadoCarpetass
    $('#btnGuardarCarpeta').click(function () {
        agregarCarpeta();
    });
    $('#btnActualizarCarpeta').click(function () {
        editarCarpeta();
    });
});


function agregarCarpeta() {
    var Carpeta = $('#nombreCarpeta').val();
    if (Carpeta == "") {
        Swal.fire("Debes Agregar un Carpeta");
        return false;
    }
    else {
        $.ajax({
            type: "POST",
            data: "carpeta=" + Carpeta,
            url: "../../Controlador/Carpetas/agregarCarpeta.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta != 0) {
                    $('#listadoCarpetas').load("../ListaArchivos/cargarCarpetas.php");
                    $('#nombreCarpeta').val("");
                    Swal.fire("Exito", "Agregado con Exito", "success");
                } else {
                    Swal.fire("Error", "Ha ocurrido un error al ingresar Carpeta", "error");
                }

            }
        });
    }
}

function obtenerDatosCarpeta(idCarpeta, nombreCarpeta) {

    if (idCarpeta == "" || nombreCarpeta == "") {
        Swal.fire("Error", "Ha ocurrido un error intentelo denuevo", "error");
        return false;
    }
    else {
        $('#idCarpeta').val(idCarpeta);
        $('#nuevoNombre').val(nombreCarpeta);
        $('#antiguoNombre').val(nombreCarpeta);
    }


}

function editarCarpeta() {
    if ($('#nuevoNombre').val() == "") {
        Swal.fire("Ingrese un nombre porfavor");
        return false;
    } else {
        //***************************************************************** */
        $.ajax({
            type: "POST",
            data: $('#frmEditarCarpeta').serialize(),
            url: "../../Controlador/Carpetas/editarCarpeta.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();

                if (respuesta == 1) {

                    $('#listadoCarpetas').load("../ListaArchivos/cargarCarpetas.php");

                    Swal.fire(
                        'Actualizado',
                        'Carpeta Actualizada con exito',
                        'success'
                    );

                    $('#modalEditarCarpeta').modal('toggle');

                } else {
                    Swal.fire("Error", "Ah ocurrido un error", "error");
                    console.log(respuesta);
                }

            }
        });
        //***************************************************************** */

    }

}

function EliminarCarpeta(idCarpetaP, nombreCarpetaP) {

    if (idCarpeta < 1) {
        Swal.fire("No Existe Carpeta");
    } else {
        //***************************************************************** */
        Swal.fire({
            title: '¿Esta seguro de eliminar Carpeta?',
            html: 'Escriba: <strong>' + nombreCarpetaP + '</strong> para eliminar',
            icon: 'warning',
            input: 'text',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result.value == nombreCarpetaP) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: { 'idCarpeta': idCarpetaP, 'nombreCarpeta': nombreCarpetaP },
                        url: "../../Controlador/Carpetas/eliminarCarpeta.php",
                        success: function (respuesta) {
                            console.log(respuesta);
                            respuesta = respuesta.trim();

                            if (respuesta == 1) {
                                $('#listadoCarpetas').load("../ListaArchivos/cargarCarpetas.php");
                                Swal.fire(
                                    'Eliminado',
                                    'Carpeta y Archivos Eliminados Con Exito',
                                    'success'
                                );
                            } else {
                                Swal.fire("Error", "Ah ocurrido un error", "error");
                            }
                        }
                    });
                }
            } else {
                Swal.fire("Error", "El nombre no es correcto", "error");
            }
        })
        //***************************************************************** */
    }


}

function clickCarpeta(idCarpetaP, nombreCarpetaP, idUsuarioP) {
    if (idCarpetaP == "" || nombreCarpetaP == "" || idUsuarioP == "") {
        Swal.fire("Error", "Ha ocurrido un error intentelo denuevo", "error");
        return false;
    }
    else {

        $.ajax({
            type: "POST",
            data: { 'idCarpeta': idCarpetaP, 'nombreCarpeta': nombreCarpetaP, 'idUsuario': idUsuarioP },
            url: "../../Controlador/Carpetas/clickCarpeta.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    window.location = "archivos.php";
                } else {
                    Swal.fire("Error", "Ah ocurrido un error", "error");
                }
            }
        });

    }
}

//Funcion que se activa cuando apreto enter
$("#nombreCarpeta").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        agregarCarpeta();
    }
});