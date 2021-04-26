<?php

$extension = $_POST['extensionArchivo'];
$ruta = $_POST['rutaArchivo'];
$nombreArchivo = $_POST['nombreArchivo'];
$rutaIconos = "../../Diseño/Img/Archivo";
$tipo = str_replace(".", "", $extension);
$PNG = ".png";

try {

    switch ($extension) {
        case '.mp4':
        case '.ogg':
        case '.webm':
            echo    '<video class="bordePrevisualizacion videoPrevisualizacion" controls>
                            <source src="' . $ruta . '" type="video/' . $tipo . '">
                            Tu buscador no soporta este formato de video
                    </video>';
            break;
        default:
            echo '<img class="ArchivosIconos" src="' . $rutaIconos . "Misterioso" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
    }

} catch (Exeption $e) {
    echo 0;
}
