<?php 
        require_once './conexionDB.php';
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $rol = $_POST["rol"];
        $diff = $_POST["diff"];
        $desc = $_POST["desc"];

      $sql = "UPDATE champ SET name='$nombre', rol='$rol',difficulty='$diff', `description` ='$desc' WHERE id='$id'";
      $result = mysqli_query($conn,$sql);
      
      header("Location: 002campeones.php");        

    ?>