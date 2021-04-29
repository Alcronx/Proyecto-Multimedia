$(document).ready(function () { //Este javascript se ejecuta cuando el documento Cargo
    $('#listadoArchivos').load("../ListaArchivos/cargarArchivos.php"); //Carga las Carpetas en el div listadoCarpetass
        $('#btnActualizarArchivo').click(function () {
            editarArchivo();
        });
});

function eliminarArchivo(rutaArchivo,idArchivo,rutaImgVideo){
    Swal.fire({
        title: '¿Esta seguro de eliminar Archivo?',
        text: "Una vez eliminada no podra recuperarlo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: {'rutaArchivo':rutaArchivo,'idArchivo':idArchivo,'rutaImgVideo':rutaImgVideo},
                url: "../../Controlador/Archivos/EliminarArchivos.php",
                success: function (respuesta) {
                    $('#listadoArchivos').load("../ListaArchivos/cargarArchivos.php");
                    respuesta = respuesta.trim();                  
                    if (respuesta == 1) {
                        $('#tablaGestorArchivos').load("../Vistas/Gestor/tablaGestor.php");
                        Swal.fire(
                            'Eliminado',
                            'Archivo eliminado con exito',
                            'success'
                        );
                    } else {
                        Swal.fire("Error", "Ah ocurrido un error", "error");
                    }
                }
            });
        }
    })
}

function obtenerDatosArchivo(idArchivo, idCarpeta,nombreArchivo,rutaArchivo,extensionArchivo) {

    if (idCarpeta == "" || nombreArchivo == "" || idArchivo == "" || rutaArchivo =="" ||extensionArchivo=="") {
        Swal.fire("Error", "Ha ocurrido un error intentelo denuevo", "error");
        return false;
    }
    else {
        $('#idCarpeta').val(idCarpeta);
        $('#idArchivo').val(idArchivo);
        $('#nuevoNombre').val(nombreArchivo);
        $('#rutaArchivo').val(rutaArchivo);
        $('#extensionArchivo').val(extensionArchivo);
        
    }


}

function editarArchivo() {
    if ($('#nuevoNombre').val() == "") {
        Swal.fire("Ingrese un nombre porfavor");
        return false;
    } else {
        //***************************************************************** */
        $.ajax({
            type: "POST",
            data: $('#frmEditarArchivo').serialize(),
            url: "../../Controlador/Archivos/editarArchivo.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    $('#listadoArchivos').load("../ListaArchivos/cargarArchivos.php");

                    Swal.fire(
                        'Actualizado',
                        'Archivo actualizado con exito',
                        'success'
                    );

                    $('#modalEditarArchivo').modal('toggle');

                } else {
                    Swal.fire("Error", "Ah ocurrido un error", "error");
                    console.log(respuesta);
                }

            }
        });
        //***************************************************************** */

    }

}

function Previsualizacion(extensionArchivo,rutaArchivo,nombreArchivo,idBotonPreview){
    //Funcion para Cargar Preview de Video, se dirige a cargarPreview.php
    $.ajax({
        type: "POST",
        data: {'extensionArchivo':extensionArchivo,'rutaArchivo':rutaArchivo,'nombreArchivo':nombreArchivo,'idBotonPreview':idBotonPreview},
        url: "../../Controlador/Archivos/cargarPreview.php",
        success: function (respuesta) {
           $('#contenedor-Interior-Body').html(respuesta);
        }
    });
}

function btnAnterior(btnAnterior){
    $('#modalPrevisualizacion').modal('hide');
    document.getElementById(btnAnterior).click();
}

function btnSiguente(btnSiguente){
    $('#modalPrevisualizacion').modal('hide');
    document.getElementById(btnSiguente).click();
}


$('#modalPrevisualizacion').on('hidden.bs.modal', function (e) {
    $('#contenedor-Interior-Body').html("");
  })



