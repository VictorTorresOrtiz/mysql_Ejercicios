<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>003Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
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
        $id = $_GET["id"];
        
        $result = mysqli_query($conn, "SELECT * FROM champ WHERE id=$id;");
        $row = mysqli_fetch_assoc($result);
        $nombre= $row["name"];
        $rol= $row["rol"];
        $difficulty= $row["difficulty"];
        $description= $row["description"];

    ?>

    <form class="row g-3 needs-validation" action="editarDatos.php" method="post">

      <div class="col-md-4">
          <input type="number" name="id" value="<?php echo $id?>" hidden>
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" id="inputName" value="<?php echo $nombre?>">
        </div>

        <div class="col-md-4">
        <label for="rol" class="form-label">Rol</label><br>
          <input type="radio" name="rol" id="Asesino" value="Asesino" <?php if($rol=='Asesino'){ echo "checked=checked";} ?>>Asesino<br>
          <input type="radio" name="rol" id="Luchador" value="Luchador" <?php if($rol=='Luchador'){ echo "checked=checked";} ?>>Luchador<br>
          <input type="radio" name="rol" id="Tirador" value="Tirador" <?php if($rol=='Tirador'){ echo "checked=checked";} ?>>Tirador<br>
          <input type="radio" name="rol" id="Mago" value="Mago" <?php if($rol=='Mago'){ echo "checked=checked";} ?>>Mago<br>
          <input type="radio" name="rol" id="Soporte" value="Soporte" <?php if($rol=='Soporte'){ echo "checked=checked";} ?>>Soporte<br>
          <input type="radio" name="rol" id="Tanque" value="Tanque" <?php if($rol=='Tanque'){ echo "checked=checked";} ?>>Tanque<br>
        </div>

        <div class="col-md-4">
          <label for="dificultad" class="form-label">Difficultad</label><br>
            <input type="radio" name="dificultad" id="Baja" value="Baja" <?php if($difficulty=='Baja'){ echo "checked=checked";} ?>>Baja<br>
            <input type="radio" name="dificultad" id="Moderada" value="Moderada" <?php if($difficulty=='Moderada'){ echo "checked=checked";} ?>>Moderada<br>
            <input type="radio" name="dificultad" id="Alta" value="Alta" <?php if($difficulty=='Alta'){ echo "checked=checked";} ?>>Alta<br>
        </div>

        <div class="col-md-4">
            <label for="desc" class="form-label">Descripcción</label><br>
            <textarea name="desc" id="desc" name="desc" cols="60" rows="30" value="<?php echo $description?>"><?php echo $description?></textarea>
        </div>

          <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>