<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>003</title>
</head>
<body>
    <?php
    require_once 'conexion.php';

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
        <label for="nombre" class="form-label">Name</label>
        <input type="text" name="nombre" class="form-control" id="inputName" value="<?php echo $nombre?>">
      </div>
      <div class="col-md-4">
      <label for="rol" class="form-label">Rol</label><br>
        <input type="radio" name="rol" id="Assasin" value="Assasin" <?php if($rol=='Assasin'){ echo "checked=checked";} ?>>Assasin<br>
        <input type="radio" name="rol" id="Fighter" value="Fighter" <?php if($rol=='Fighter'){ echo "checked=checked";} ?>>Fighter<br>
        <input type="radio" name="rol" id="Marksman" value="Marksman" <?php if($rol=='Marksman'){ echo "checked=checked";} ?>>Marksman<br>
        <input type="radio" name="rol" id="Mage" value="Mage" <?php if($rol=='Mage'){ echo "checked=checked";} ?>>Mage<br>
        <input type="radio" name="rol" id="Support" value="Support" <?php if($rol=='Support'){ echo "checked=checked";} ?>>Support<br>
        <input type="radio" name="rol" id="Tank" value="Tank" <?php if($rol=='Tank'){ echo "checked=checked";} ?>>Tank<br>
      </div>
      <div class="col-md-4">
      <label for="diff" class="form-label">Difficulty</label><br>
        <input type="radio" name="diff" id="Low" value="Low" <?php if($difficulty=='Low'){ echo "checked=checked";} ?>>Low<br>
        <input type="radio" name="diff" id="Moderated" value="Moderated" <?php if($difficulty=='Moderated'){ echo "checked=checked";} ?>>Moderated<br>
        <input type="radio" name="diff" id="High" value="High" <?php if($difficulty=='High'){ echo "checked=checked";} ?>>High<br>
      </div>
      <div class="col-md-4">
        <label for="desc" class="form-label">Description</label><br>
        <textarea name="desc" id="desc" name="desc" cols="40" rows="20" value="<?php echo $description?>"><?php echo $description?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        
</body>
</html>








