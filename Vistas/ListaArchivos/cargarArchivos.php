<?php
session_start();
require_once "../../Modelo/conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$idCarpeta = $_SESSION['idCarpeta'];
$nombreCarpeta = $_SESSION['nombreCarpeta'];
$extencionImgVideo = ".jpg";

$conexion = new Conexion();
$conexion = $conexion->conexion();

$sql = "Select 		archivo.idArchivo as idArchivo,
                    archivo.nombre as nombreArchivo,
                    archivo.extension as extensionArchivo,
                    concat(archivo.ruta,  archivo.idArchivo,   archivo.extension) as rutaArchivo,
                    concat(archivo.rutaImgVideo,    archivo.idArchivo,    '$extencionImgVideo') as rutaImgVideo

                            from t_archivo as archivo

                            inner join t_carpeta as carpeta
                            on carpeta.idCarpeta = archivo.idCarpeta

                            where carpeta.idUsuario= '$idUsuario' and carpeta.idCarpeta= '$idCarpeta'
                            order by archivo.nombre asc;";

$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result)) { //Inicio while
    $nombreArchivo = $mostrar['nombreArchivo'];
    $extensionArchivo = $mostrar['extensionArchivo'];
    $rutaArchivo = $mostrar['rutaArchivo'];
    $idArchivo = $mostrar['idArchivo'];
    $rutaImgVideo = $mostrar['rutaImgVideo'];
    $extensionesPrevisualizacion = array(".mp4", ".ogg", ".webm");
    ?>

<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2 mb-3 d-flex justify-content-center">
    <div class="divArchivo borde d-flex justify-content-center">
        <div class="Contenedor-superior">
            <!--Multimedia-->
            <div class="Contenedor-multimedia d-flex justify-content-center align-items-center">
                <?php echo cargarArchivos($extensionArchivo, $rutaArchivo, $nombreArchivo, $rutaImgVideo) ?>
            </div>
            <!--Fin multimedia-->
            <!--Botones-->
            <div class="Contenedor-botones d-flex jusify-content-center">
                <div class="ContenedorBotonesArriba d-flex justify-content-around align-items-center flex-nowrap">
                    <?php //****************************************php****************************************
    if (in_array($extensionArchivo, $extensionesPrevisualizacion)) {
        ?>

                    <button type="button" class="btn btn-primary fas fa-eye" onclick="Previsualizacion('<?php echo $extensionArchivo ?>','<?php echo $rutaArchivo ?>','<?php $nombreArchivo?>')"
                        data-toggle="modal" data-target="#modalPrevisualizacion">
                    </button>

                    <?php //****************************************php****************************************
    }?>
                    <button type="button" class="btn btn-success fas fa-download"
                        onclick="descargarArchivo('<?php echo $rutaArchivo ?>','<?php echo $nombreArchivo ?>','<?php echo $extensionArchivo ?>')">
                    </button>
                </div>
                <div class="ContenedorBotonesAbajo d-flex justify-content-around align-items-center flex-nowrap">
                    <button type="button" class="btn btn-warning fas fa-edit"
                        onclick="obtenerDatosArchivo('<?php echo $idArchivo ?>','<?php echo $idCarpeta ?>','<?php echo $nombreArchivo ?>','<?php echo $rutaArchivo ?>','<?php echo $extensionArchivo ?>')"
                        data-toggle="modal" data-target="#modalEditarArchivo">
                    </button>
                    <button type="button" class="btn btn-danger  fas fa-trash-alt"
                        onclick="eliminarArchivo('<?php echo $rutaArchivo ?>','<?php echo $idArchivo ?>','<?php echo $rutaImgVideo ?>')">
                    </button>
                </div>
            </div>
            <!--Fin Botones-->
        </div>

        <div class="Contenedor-inferior">
            <?php echo $nombreArchivo ?>
        </div>
    </div>
</div>

<?php
} //Fin While
?>



<script type="text/javascript">
function descargarArchivo(url, nombre, extension) {
    var link = document.createElement("a");
    link.setAttribute('download', nombre + extension);
    link.href = url;
    document.body.appendChild(link);
    link.click();
    link.remove();
}
</script>

<?php
function cargarArchivos($extensionArchivo, $rutaArchivo, $nombreArchivo, $rutaImgVideo)
{

    $rutaIconos = "../../Diseño/Img/Archivo";
    $PNG = ".png";

    switch ($extensionArchivo) {
        case '.png':
        case '.jpg':
        case '.jpeg':
            return '<img class="multimedia" src="' . $rutaArchivo . '" alt="' . $nombreArchivo . '">';
            break;
        case '.exe':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "EXE" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.gif':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "GIF" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.html':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "HTML" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.js':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "JS" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.mp3':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "MP3" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.pdf':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "PDF" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.rar':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "RAR" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.txt':
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "TXT" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
        case '.mp4':
        case '.ogg':
        case '.webm':
            return '<img class="video" src="' . $rutaImgVideo . '" alt="' . $nombreArchivo . '">';
            break;
        default:
            return '<img class="ArchivosIconos" src="' . $rutaIconos . "Misterioso" . $PNG . '" alt="' . $nombreArchivo . '">';
            break;
    }

}

?>