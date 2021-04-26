<?php

require_once "conexion.php";

class Usuario extends Conexion{
    public function login($usuario,$contraseña){
        
        
    $conexion = Conexion::conexion();

    $sql = "SELECT count(*) as existeUsuario from t_usuario where nombre = '$usuario' and contraseña = MD5('$contraseña')";

    $result = mysqli_query($conexion,$sql);

    $respuesta = mysqli_fetch_array($result)['existeUsuario'];

    if ($respuesta > 0){
        $_SESSION['nombreUsuario'] = $usuario;//Guarda en una cokkie el Nombre De Usuario

        $sql = "SELECT idUsuario from t_usuario where nombre = '$usuario' and contraseña =  MD5('$contraseña')";

        $result = mysqli_query($conexion, $sql);
        $idUsuario = mysqli_fetch_row($result)[0];

        $_SESSION['idUsuario'] = $idUsuario; //Guarda en una cokkie la Id de usuario

        return 1;
    }else{
        return 0;
    }

    }
}

?>