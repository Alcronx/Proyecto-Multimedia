<?php
//****************************Inicio datos Post****************************
$extension = $_POST['extensionArchivo'];
$ruta = $_POST['rutaArchivo'];
$nombreArchivo = $_POST['nombreArchivo'];
$rutaIconos = "../../Diseño/Img/Archivo";
$tipo = str_replace(".", "", $extension)=="mkv" ? "mp4" :  str_replace(".", "", $extension);
$idBotonPreview = $_POST['idBotonPreview'];
//0-NombreBoton,1-BotonActual,2-NumeroArchivos
$arrayBotones = explode("-", $idBotonPreview);
$nombreBoton = $arrayBotones[0];
$botonActual = $arrayBotones[1];
$numeroArchivos = $arrayBotones[2];
//****************************FIn datos Post****************************
$idSiguente = $botonActual == $numeroArchivos ? $nombreBoton . "-1-" . $numeroArchivos : $nombreBoton . "-" . (int) ($botonActual + 1) . "-" . $numeroArchivos;
$idAnterior = $botonActual == 1 ? $nombreBoton . "-" . $numeroArchivos . "-" . $numeroArchivos : $nombreBoton . "-" . (int) ($botonActual - 1) . "-" . $numeroArchivos;
$BtnSiguente = '<button type="button"  class="btnFlechas btn-izq fas fa-arrow-circle-left" onclick="btnAnterior(' . "'" . $idAnterior . "'" . ')"> </button>';
$BotonAnterior = '<button type="button"  class="btnFlechas btn-der fas fa-arrow-circle-right" onclick="btnSiguente(' . "'" . $idSiguente . "'" . ')"> </button>';
$TextoSuperior = '<div class="textoPreview">' . $nombreArchivo . '</div>';
$contenidoPreview = $BtnSiguente . $BotonAnterior . $TextoSuperior;
$etiquetaMultimedia = "";
$PNG = ".png";

try {

    switch ($extension) {
        case '.mp4':
        case '.ogg':
        case '.webm':
        case '.mkv':
            $etiquetaMultimedia = '<video class="bordePrevisualizacion videoPrevisualizacion" autoplay controls> <source src="' . $ruta . '" type="video/' . $tipo . '">
                                            Tu buscador no soporta este formato de video
                                            </video>';
            break;
        case '.png':
        case '.jpg':
        case '.jpeg':
            $etiquetaMultimedia = '<img class="bordePrevisualizacion imgPreview" src="' . $ruta . '" alt="' . $nombreArchivo . '">';
            break;
        case '.pdf':
            $etiquetaMultimedia = '<iframe src="' . $ruta . '#view=Fit" style="width:80%; height:600px;" frameborder="0"></iframe>';
            break;
        case '.mp3':
            $etiquetaMultimedia = ' <div class="AudioContainer"> <audio controls src="' . $ruta . '">
                                        Tu Buscador No Soporta Este formato
                                    </audio></div>';
            break;
        case '.exe':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "EXE" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.gif':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "GIF" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.html':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "HTML" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.js':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "JS" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.rar':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "RAR" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.txt':
            $etiquetaMultimedia = '<img class="ArchivosIconos" src="' . $rutaIconos . "TXT" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        default:
            $etiquetaMultimedia = '<img class="bordePrevisualizacion ArchivosIconosPreview" src="' . $rutaIconos . "Misterioso" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
    }

    echo $contenidoPreview . $etiquetaMultimedia;

} catch (Exeption $e) {
    echo 0;
}
