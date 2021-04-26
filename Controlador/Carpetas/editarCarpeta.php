<?php

    require_once "../../Modelo/carpeta.php";

    session_start();

    $Carpeta = new Carpeta();
    $idCarpeta = $_POST['idCarpeta'];
    $idUsuario = $_SESSION['idUsuario'];
    $nuevoNombre = $_POST['nuevoNombre'];

    $datos = array (

        "idCarpeta" => $idCarpeta,
        "idUsuario" => $idUsuario,
        "nuevoNombre" => $nuevoNombre,
    );

    $respuesta = $Carpeta->editarCarpeta($datos);

    if($respuesta == 1){
        echo 1;
    }else{
        echo 0;
    }

?>