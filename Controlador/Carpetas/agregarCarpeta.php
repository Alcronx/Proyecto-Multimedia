<?php

    session_start();

    require_once "../../Modelo/carpeta.php";

    $Carpeta = new Carpeta();
    $idUsuario = $_SESSION['idUsuario'];
    $NombreCarpeta = $_POST['carpeta'];

    $datos = array ( "idUsuario" => $idUsuario,
                      "carpeta" => $NombreCarpeta);


    $respuesta = $Carpeta->agregarCarpeta($datos);

    if($respuesta != 0){
        $carpetaArchivos = '../../Archivos';
        $carpetaUsuario = '../../Archivos/'.$idUsuario; 
        $NombreCarpeta = '../../Archivos/'.$idUsuario.'/'.$respuesta;
        $carpetaImgVideos = '../../Archivos/'.$idUsuario.'/'.$respuesta.'/'."imgVideo";
        
        if(!file_exists($carpetaArchivos )){
            mkdir($carpetaArchivos, 0777,true);
        }
        
        if(!file_exists($carpetaUsuario )){
            mkdir($carpetaUsuario, 0777,true);
        }

        if(!file_exists($NombreCarpeta)){
            mkdir($NombreCarpeta, 0777,true);
        }

        if(!file_exists( $carpetaImgVideos)){
            mkdir( $carpetaImgVideos, 0777,true);
        }

        echo 1;
    }else{
        echo 0;
    }


?>