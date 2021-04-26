<?php

    require_once "conexion.php";

    class Carpeta  extends Conexion
    {
        public function agregarCarpeta($datos){
            $conexion = Conexion::conexion();
            $respuesta = 0;

            $sql = "INSERT INTO t_carpeta (idUsuario,nombre) VALUES (?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("is", $datos['idUsuario'],$datos['carpeta']);

            if($query->execute()){
                $respuesta = $query->insert_id;
            }
            
            
            $query->close();
            return $respuesta;
        }

        public function editarCarpeta($Datos){

            $conexion = Conexion::conexion();

            $sql = "UPDATE t_carpeta set nombre = ? where idCarpeta = ? and idUsuario = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("sii", $Datos['nuevoNombre'],
                                $Datos['idCarpeta'],
                                $Datos['idUsuario']);

            $respuesta = $query->execute();
            $query->close();
            

            return $respuesta;

        }

        
        public function eliminarCarpeta($idCarpeta,$idUsuario){

            $conexion = Conexion::conexion();

            $sql = "DELETE FROM t_carpeta where idCarpeta = ? and idUsuario = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("ii", $idCarpeta, $idUsuario);

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        }
    }
    
?>