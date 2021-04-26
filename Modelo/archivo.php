<?php

    require_once "conexion.php";

    class Archivo  extends Conexion
    {
        public function agregarRegistroArchivo($datos){
            $conexion = Conexion::conexion();
            $respuesta = 0;

            $sql = "INSERT INTO t_archivo (idCarpeta,nombre,extension,ruta,rutaImgVideo)
                   VALUES (?,?,?,?,?);";     

            $query = $conexion->prepare($sql);
            $query->bind_param ("issss",    $datos['idCarpeta'],
                                            $datos['nombreArchivo'],
                                            $datos['tipo'],
                                            $datos['rutaArchivo'],
                                            $datos['rutaImgVideo']);

            if($query->execute()){
                $respuesta = $query->insert_id;
            }
            
            
            $query->close();
            return $respuesta;
        }
        
        public function eliminarArchivo($idArchivo){

            $conexion = Conexion::conexion();

            $sql = "DELETE FROM t_archivo where idArchivo = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("i", $idArchivo);

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        }

        public function editarArchivo($Datos){

            $conexion = Conexion::conexion();
            
            $sql = "UPDATE t_archivo set nombre = ? where idCarpeta = ? and idArchivo = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("sii", $Datos['nuevoNombre'],
                                $Datos['idCarpeta'],
                                $Datos['idArchivo']);

            $respuesta = $query->execute();
            $query->close();
            

            return $respuesta;

        }

    }
    
?>
