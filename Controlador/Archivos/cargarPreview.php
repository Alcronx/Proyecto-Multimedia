<?php

$extension = $_POST['extensionArchivo'];
$ruta = $_POST['rutaArchivo'];
$nombreArchivo = $_POST['nombreArchivo'];
$rutaIconos = "../../Diseño/Img/Archivo";
$tipo = str_replace(".", "", $extension);
$idBotonPreview = $_POST['idBotonPreview'];

//0-NombreBoton,1-BotonActual,2-NumeroArchivos
$arrayBotones = explode("-",$idBotonPreview);
$nombreBoton = $arrayBotones[0] ;
$botonActual = $arrayBotones[1] ;
$numeroArchivos = $arrayBotones[2];

$BotonSiguente = $botonActual == $numeroArchivos ? $nombreBoton."-1-".$numeroArchivos : $nombreBoton."-".(int)($botonActual+1)."-".$numeroArchivos; 
$BotonAnterior = $botonActual == 1 ? $nombreBoton."-".$numeroArchivos."-".$numeroArchivos : $nombreBoton."-".(int)($botonActual-1)."-".$numeroArchivos; 

$BtnSiguente = '<button type="button"  class="btnFlechas btn-izq fas fa-arrow-circle-left" onclick="btnAnterior('."'".$BotonAnterior."'".')"> </button>';
$BotonAnterior = '<button type="button"  class="btnFlechas btn-der fas fa-arrow-circle-right" onclick="btnSiguente('."'".$BotonSiguente."'".')"> </button>';
$PNG = ".png";

try {

    switch ($extension) {
        case '.mp4':
        case '.ogg':
        case '.webm':
            echo    
                    '<div class="textoPreview">'.$nombreArchivo.'</div>'.
                    $BtnSiguente.
                    '<video class="bordePrevisualizacion videoPrevisualizacion" controls>
                            <source src="' . $ruta . '" type="video/' . $tipo . '">
                            Tu buscador no soporta este formato de video
                    </video>'
                    .$BotonAnterior;
            break;
        default:
            echo '<img class="ArchivosIconosPreview" src="' . $rutaIconos . "Misterioso" . $PNG . '" alt="' . $nombreArchivo . '">'.Botones($BotonSiguente , $BotonAnterior);
            break;
    }

} catch (Exeption $e) {
    echo 0;
}









    

