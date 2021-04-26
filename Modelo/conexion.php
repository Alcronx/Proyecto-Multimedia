<?php

class Conexion{
    public function conexion(){
        $servidor = "localhost";
        $usuario = "alex";
        $password = "15010204";
        $base = "multimedia";

        $conexion = mysqli_connect($servidor,$usuario,$password,$base);
        $conexion ->set_charset('utf8mb4');
        
        return $conexion;

    }
}

?>