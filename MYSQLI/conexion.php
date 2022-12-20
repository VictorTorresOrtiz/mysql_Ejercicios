<?php
    $conexion = mysqli_connect("localhost", "root","" ,"lol"); // Conexión

    //Comprobamos
    if (mysqli_connect_errno()){
        echo "Error al conectar a la Base de Datos: " .mysqli_connect_errno();
        exit();
    }
    echo "Conectado con exito";
?>