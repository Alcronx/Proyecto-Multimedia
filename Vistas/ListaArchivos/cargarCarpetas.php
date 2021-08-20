<?php 
    session_start();
    require_once "../../Modelo/conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conexion();
    $conexion = $conexion->conexion();

                     $sql = "Select idCarpeta,nombre from t_carpeta where idUsuario = '$idUsuario' order by LENGTH(nombre),nombre asc;";
                     $result = mysqli_query($conexion,$sql);
                     $contador = 0;
                     while ($mostrar = mysqli_fetch_array($result)){
                         $idCarpeta= $mostrar['idCarpeta'];
                         $nombreCarpeta = $mostrar['nombre'];
                         $contador = $contador+1;
                         
?>

<div class="col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-3">
    <div class="row d-flex justify-content-center text-center">
        <a id="<?php echo $nombreCarpeta.$contador ?>" onclick="clickCarpeta('<?php echo $idCarpeta?>','<?php echo $nombreCarpeta?>','<?php echo $idUsuario?>')">
            <i class="fas fa-folder fa-10x colorIcono zoom"></i>
            <div>
                <h5 class="colorTextoCarpeta"><?php echo $nombreCarpeta ?></h5>
            </div>
        </a>
    </div>
    <div class="row d-flex justify-content-center">
        <button type="button" class="btn btn-warning col-3 mr-1 botonCarpeta fas fa-edit" onclick="obtenerDatosCarpeta('<?php echo $idCarpeta?>','<?php echo $nombreCarpeta?>')"
        data-toggle="modal" data-target="#modalEditarCarpeta"></button>
        <button type="button" class="btn btn-danger col-3 ml-1 botonCarpeta fas fa-trash-alt" onclick="EliminarCarpeta('<?php echo $idCarpeta?>','<?php echo $nombreCarpeta?>')"></button>
    </div>
</div>

<?php
                     } 
?>