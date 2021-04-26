<?php

    session_start();

    require_once "../../Modelo/archivo.php";
    $Archivo = new Archivo();

    $rutaArchivo = $_POST['rutaArchivo'];
    $idArchivo = $_POST['idArchivo'];
    $rutaImgVideo = $_POST['rutaImgVideo'];
    $respuesta = $Archivo->eliminarArchivo($idArchivo);
       
        

        if($respuesta == 1){
    
            if(file_exists($rutaImgVideo)){
                unlink($rutaImgVideo);
            }
            if(file_exists($rutaArchivo)){
                unlink($rutaArchivo);
            }
            
    
            echo 1;
        }else{
            echo 0;
        }
    

    

?>