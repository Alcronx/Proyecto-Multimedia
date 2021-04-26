<?php

    session_start();
    require_once "../../Modelo/login.php";

    $usuario = $_POST['Usuario'];
    $contraseña = $_POST['Contraseña'];

    $usuarioObj = new Usuario();
    echo $usuarioObj -> login($usuario,$contraseña);

?>