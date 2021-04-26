<?php
    
    session_start();

    require_once "../../Modelo/archivo.php";
    $Archivo = new Archivo();
    $idUsuario = $_SESSION['idUsuario'];
    $nombreCarpeta = $_SESSION['nombreCarpeta'];
    $idArchivo = $_POST['idArchivo'];
    $idCarpeta = $_POST['idCarpeta'];
    $nuevoNombre = $_POST['nuevoNombre'];
    $rutaArchivo = $_POST['rutaArchivo'];


    $datos = array (
        "idArchivo" => $idArchivo,
        "idCarpeta" => $idCarpeta,
        "nuevoNombre" => $nuevoNombre
    );

    $respuesta = $Archivo->editarArchivo($datos);

    if($respuesta == 1){
        echo 1;

    }else{
        echo 0;
    }

?>