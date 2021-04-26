<?php

    session_start();

    $_SESSION['idCarpeta'] = $_POST['idCarpeta'];
    $_SESSION['nombreCarpeta'] = $_POST['nombreCarpeta'];

    if(isset($_SESSION['idCarpeta']) && isset($_SESSION['nombreCarpeta']))
    {
        echo 1;
    }else{
        echo 0;
    }

?>