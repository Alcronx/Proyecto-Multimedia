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

    




    <!-- Vista en comun fotter, termina en </body> </html> -->
    <?php include "../VistasCompartidas/fotter.php";?>
    <!--******************** Agregar archivos JS especifico aqui ********************-->


    <!--******************** Agregar archivos Js especifico aqui ********************--> 
    <!--Fin body -->
</body>

</html>

<?php
    }else{
        header("location:../../index.php");
    }

?>