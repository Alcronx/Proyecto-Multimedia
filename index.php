<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
unset($_SESSION["nombreCarpeta"]);
unset($_SESSION["idCarpeta"]); 
if(isset($_SESSION["nombreUsuario"])) {
    header("location: Vistas/VistaEspecifica/inicio.php");
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="Diseño/Img/icono.png" sizes="64x64">

    <!--Libreria Bootstrap 	Css-->
    <link href="Dependencias/Bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Css FontAwesome -->
    <link rel="stylesheet" type="text/css" href="Dependencias/Fontawesome/css/all.min.css">
    <!--Css Login -->
    <link rel="stylesheet" type="text/css" href="Diseño/Login/login.css">
    <!-- -->

</head>

<body>
<div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-headerLogin">
                    <h3>Ingresar</h3>
                </div>
                <div class="card-body">
                    <form method="post" id="frmLogin" onsubmit="return logear()">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario" required="">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="Contraseña" class="form-control"  name="Contraseña" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Aceptar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Funcion Logear-->
    <script src="Controlador/Index/login.js"></script>

    <!--Libreria Jquery-->
    <script src="Dependencias/Jquery/jquery.min.js"></script>

    <!--Libreria Bootstrap Js-->
    <script src="Dependencias/Bootstrap/bootstrap.min.js"></script>

    <!--Sweet Alert -->
    <script src="Dependencias/Sweetalert/sweetalert.all.min.js"></script>
</body>

</html>