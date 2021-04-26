<?php

require_once "../../Modelo/carpeta.php";
session_start();
$Carpeta = new Carpeta();
$idCarpeta = $_POST['idCarpeta'];
$idUsuario = $_SESSION['idUsuario'];
$nombreCarpeta = $_POST['nombreCarpeta'];

$respuesta = $Carpeta->eliminarCarpeta($idCarpeta, $idUsuario);
$dir= '../../Archivos/' . $idUsuario . '/' . $idCarpeta;

if ($respuesta == 1) {
    rrmdir($dir);
    echo 1;
} else {
    echo 0;
}

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") {
                    rrmdir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }

            }
        }
        reset($objects);
        rmdir($dir);
    }
}
