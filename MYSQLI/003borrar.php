<?php
        require_once './conexionDB.php';
        $id = $_GET["id"];

        $sql = "DELETE FROM champ WHERE id=$id";
        $result = mysqli_query($conn,$sql);

        header("Location: 002campeones.php");          
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    
</body>
</html>