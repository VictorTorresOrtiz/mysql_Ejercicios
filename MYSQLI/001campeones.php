<?php 
    $servername = "localhost";
    $database = "lol";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        echo("Connection failed: " . mysqli_connect_error());
        exit();
    }   
        
        $sql="SELECT * FROM champ;";
        $listachamp = mysqli_query($conn, $sql);

        echo "<ul>";
        foreach($listachamp as $campeon){
            echo "<li>";
            echo "$campeon[name] -----*******--- $campeon[rol]";
            echo "</li>";
        }
        echo "</ul>";
 
?>