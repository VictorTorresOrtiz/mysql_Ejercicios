<?php
require_once 'conexion.php';
/*
Crea el archivo 001campeones.php donde listes todos los campeones del LOL que has metido 
en tu base de datos. Acuérdate que para ello deberás hacer una conexión con la base de datos 
y un foreach para cada campeón que tengas albergado en la tabla champ.
*/


//Consultas
echo "<ul>";
foreach($listachamp as $campeon){
    echo "<li>";
    echo "$campeon[name] ---- $campeon[rol]";
    echo "</li>";
}
echo "</ul>";

?>