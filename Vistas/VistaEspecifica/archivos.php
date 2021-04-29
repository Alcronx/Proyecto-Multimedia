<?php
session_start();
$NombeUsuario = $_SESSION['nombreUsuario'];
$idCarpeta = $_SESSION['idCarpeta'];
$nombreCarpeta = $_SESSION['nombreCarpeta'];
if (isset($NombeUsuario)) {
    if (isset($idCarpeta) && isset($nombreCarpeta)) {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Vista en comun header -->
    <?php include "../VistasCompartidas/header.php";?>
    <link rel="icon" type="image/png" href="../../Diseño/Img/icono.png" sizes="64x64">
    <!--******************** Agregar archivos css especifico aqui ********************-->
    <!--Dropzone css-->
    <link rel="stylesheet" href="../../Dependencias/Dropzone/dropzone.css">
    <link rel="stylesheet" href="../../Diseño/Dropzone/dropzone.css">
    <link rel="stylesheet" href="../../Diseño/ModalPrevisualizacion/modalPrevisualizacion.css">
    <!--******************** Agregar archivos css especifico aqui ********************-->
    <!--Fin Head -->
</head>

<!--Inicio body -->

<body>
    <!--Navbar -->
    <?php include "../VistasCompartidas/navbar.php";?>
    <!--************************************************************************-->


    <div class="container-xl grid">
        <!--***********Dropzone***********-->
        <div class="row sm-1 align-items-center">
            <div class="col-md-12 text-center" data-aos="fade-up">
                <h2><?php echo $nombreCarpeta ?></h2>
                <div class="form-container">
                    <form class="dropzone d-flex justify-content-center aling-items-center flex-wrap" id="frmArchivos"
                        action="../../Controlador/Archivos/agregarArchivo.php">
                        <div class="dz-message">
                            <div class="icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <h2 class="nota">Deja Tus Archivos Aqui<h2>
                                    <span class="note">No hay archivos seleccionados</span>
                        </div>
                        <div class="fallback">
                            <input type="file" name="file" multiple="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--***********Dropzone***********-->

        <hr>

        <!--***********Carpetas a Agregar***********-->
        <div class="row mr-2 ml-2 " id="listadoArchivos">


        </div>
        <!--***********Carpetas a Agregar***********-->
    </div>


    <!-- Modal EditarArchivo -->
    <div class="modal fade" id="modalEditarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEditarArchivo">
                        <input type="text" id="idCarpeta" name="idCarpeta" hidden="">
                        <input type="text" id="idArchivo" name="idArchivo" hidden="">
                        <input type="text" id="rutaArchivo" name="rutaArchivo" hidden="">
                        <input type="text" id="extensionArchivo" name="extensionArchivo" hidden="">
                        <label>Nombre</label>
                        <input type="text" id="nuevoNombre" name="nuevoNombre" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="btnCerrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizarArchivo">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal EditarArchivo -->

    <!-- Modal Previsualizaciones-->
    <div class="modal" id="modalPrevisualizacion">
        <div class="modal-personalizado">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body-personalizado">

                    <button type="button" class="btn Botoncerrar" data-dismiss="modal"><i
                            class="fa fa-times"></i></button>
                    <div id="contenedor-Interior-Body" class="contenedor-Interior-Body">
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal Previsualizaciones-->


    <!-- Vista en comun fotter, termina en </body> </html> -->
    <?php include "../VistasCompartidas/fotter.php";?>
    <!--******************** Agregar archivos JS especifico aqui ********************-->
    <!--Dropzone Js-->
    <script src="../../Dependencias/Dropzone/dropzone.js"></script>
    <script src="../../Controlador/Archivos/archivos.js"></script>
    <script type="text/javascript">
    Dropzone.options.frmArchivos = {
        init: function() {
            var tiempoVideo = 0;
            this.on("success", function(file, respuesta) {
                if (respuesta == 1) {
                    $('#listadoArchivos').load("../ListaArchivos/cargarArchivos.php");
                } else {
                    console.log(respuesta);
                    Swal.fire("Error", "Ha ocurrido un error al subir archivo", "error");
                }
            });

        }
    }
    </script>
    <!--******************** Agregar archivos Js especifico aqui ********************-->
    <!--Fin body -->
</body>

</html>

<?php
} else {
        header("location: carpetas.php");
    }
} else {
    header("location:../../index.php");
}

?>