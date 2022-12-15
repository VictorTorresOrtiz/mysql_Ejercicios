<?php
/*
Crea el archivo 001campeones.php donde listes todos los campeones del LOL que has metido 
en tu base de datos. Acuérdate que para ello deberás hacer una conexión con la base de datos 
y un foreach para cada campeón que tengas albergado en la tabla champ.
*/

$conexion = mysqli_connect("localhost", "root", "lol"); // Conexión

//Comprobamos
if (mysqli_connect_errno()){
    echo "Error al conectar a la Base de Datos: " .mysqli_connect_errno();
    exit();
}

//Consultas
$consulta = "SELECT * FROM 'champ'";
$listarChamp = mysqli_query($conexion, $consulta);

If ($listarChamp){
    foreach($listarChamp as $campeones){
        echo "$campeones[id] $campeones[nombre] </br>";
    }
}




?>