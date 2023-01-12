<?php

        require_once './conexionDB.php';
        
        $consulta="SELECT * FROM champ;";
        $listachamp = mysqli_query($conn, $consulta);

        echo "<ul>";
        foreach($listachamp as $campeon){
            echo "<li>";
                echo "$campeon[name] ---> $campeon[rol]";
            echo "</li>";
        }
        echo "</ul>";
?>