<?php 
    require_once 'db.php';
    $sql="SELECT * FROM champ;";
    $listachamp = mysqli_query($conn, $sql);

    echo "<ul>";
        foreach($listachamp as $campeon){
            echo "<li>";
            echo "$campeon[name] --> $campeon[rol]";
            echo "</li>";
        }
    echo "</ul>";
 
?>