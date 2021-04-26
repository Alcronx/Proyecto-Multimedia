<?php 
    session_start();
    unset($_SESSION["nombreCarpeta"]);
    unset($_SESSION["idCarpeta"]);
    if(isset($_SESSION['nombreUsuario'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Vista en comun header  -->
    <?php include "../VistasCompartidas/header.php";?>
    <link rel="icon" type="image/png" href="../../Diseño/Img/icono.png" sizes="64x64">
    <!--******************** Agregar archivos css especifico aqui ********************-->


    <!--******************** Agregar archivos css especifico aqui ********************-->
    <!--Fin Head -->
</head>

<!--Inicio body -->

<body>
    <!--Navbar -->
    <?php include "../VistasCompartidas/navbar.php";?>
    <!--************************************************************************-->

    <div class="container-xl grid">
        <div class="row sm-1 align-items-center">
            <div class="col-md-12 " data-aos="fade-up">
                <h2>Carpetas</h2>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarpeta">
                            <span class=" fas fa-plus-circle"></span> Agregar Carpeta
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--***********Carpetas a Agregar***********-->
        <div class="row" id="listadoCarpetas"></div>
        <!--***********Carpetas a Agregar***********-->
    </div>

    <!-- Modal Agregar Carpetas-->
    <div class="modal fade" id="modalAgregarCarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCarpeta" onSubmit="return false;">
                        <label>Nombre Carpeta</label>
                        <input type="text" name="nombreCarpeta" id="nombreCarpeta" maxlength="15" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCarpeta">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EditarCarpeta -->
    <div class="modal fade" id="modalEditarCarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEditarCarpeta">
                        <input type="text" id="idCarpeta" name="idCarpeta" hidden="">
                        <label>Editar Nombre</label>
                        <input type="text" id="nuevoNombre" name="nuevoNombre" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="btnCerrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizarCarpeta">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vista en comun fotter, termina en </body> </html> -->
    <?php include "../VistasCompartidas/fotter.php";?>


    <!--******************** Agregar archivos JS especifico aqui ********************-->
    <!--Js Carpetas-->
    <script src="../../Controlador/Carpetas/carpetas.js"></script>


    <!--******************** Agregar archivos Js especifico aqui ********************-->
    <!--Fin body -->
</body>

</html>

<?php
    }else{
        header("location:../../index.php");
    }

?>