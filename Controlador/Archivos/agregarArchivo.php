<?php

session_start();

require_once "../../Modelo/archivo.php";

$Archivo = new Archivo();
$idUsuario = $_SESSION['idUsuario'];
$idCarpeta = $_SESSION['idCarpeta'];
$nombreCarpeta = $_SESSION['nombreCarpeta'];
$videoImgExtension = ".jpg";
$Archivotemp = $_FILES['file']['tmp_name'];

if (file_exists ($Archivotemp)) {
    $rutaArchivo = '../../Archivos/' . $idUsuario . '/' . $idCarpeta; 
    $rutaImgVideo = rutaImgVideo($rutaArchivo);

    $nombre = $_FILES['file']['name'];
    $explode = explode('.', $nombre);
    $tipoArchivo = "." . end($explode);
    $nombreArchivo = reset($explode);
    $datosRegistroArchivo = array(
        "idCarpeta" => $idCarpeta,
        "nombreArchivo" => $nombreArchivo.$tipoArchivo,
        "tipo" => $tipoArchivo,
        "rutaArchivo" => $rutaArchivo . "/",
        "rutaImgVideo" => $rutaImgVideo,
    );

    $respuesta = $Archivo->agregarRegistroArchivo($datosRegistroArchivo);

} else {
    $respuesta = 0;
}

if ($respuesta != 0) {

    $rutaGuardar = $rutaArchivo . '/' . $respuesta . $tipoArchivo;
    move_uploaded_file($_FILES["file"]["tmp_name"], $rutaGuardar);  
    
    if ($_FILES["file"]["type"] == "video/mp4"){
        VistaPreviaVideo($idUsuario,$idCarpeta,$rutaGuardar,$respuesta,$videoImgExtension);
    }

    echo 1;
} else {
    echo 0;
}

//*************************************************************************************************************************
//********************************************************Funciones********************************************************
//*************************************************************************************************************************


//Funcion que crea una vista previa de un video
function VistaPreviaVideo($idUsuario,$idCarpeta, $rutaGuardar,$respuesta,$videoImgExtension)
{  
    $carpetaImgVideos = '../../Archivos/'.$idUsuario.'/'.$idCarpeta.'/'."imgVideo";
    $rutaSalida = $carpetaImgVideos."/".$respuesta.$videoImgExtension;
    $escala = "scale=-1:'min(400,ih)'";

    if(!file_exists($carpetaImgVideos)){
        mkdir( $carpetaImgVideos, 0777,true);
    }

    $ComandoDuracion = exec('ffprobe -i  ' . '"' . $rutaGuardar  . '"' . ' -show_entries format=duration -v quiet -of csv="p=0"');
    $Duracion = round(($ComandoDuracion) / 2);
    exec('ffmpeg -ss ' . $Duracion . ' -i ' . '"' . $rutaGuardar  . '"' . ' -vf '. '"' .$escala. '"' .',setsar=1 -vframes 1 -q:v 2 ' . '"' .$rutaSalida. '"');
}

//Funcion para obtener la ruta de la imagen del video
function rutaImgVideo($rutaArchivo)
{
    
    $carpetaImgVideos = "imgVideo";
    if ($_FILES["file"]["type"] == "video/mp4") {
        return $rutaArchivo . "/".$carpetaImgVideos."/";
    } else {
        return "";
    }
}



//*************************************************************************************************************************
//********************************************************Funciones********************************************************
//*************************************************************************************************************************