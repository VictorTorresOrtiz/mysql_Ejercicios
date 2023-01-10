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
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $rol = $_POST["rol"];
        $diff = $_POST["diff"];
        $desc = $_POST["desc"];

      $sql = "UPDATE champ SET name='$nombre', rol='$rol',difficulty='$diff', `description` ='$desc' WHERE id='$id'";
      $result = mysqli_query($conn,$sql);

        
      echo '<script language="javascript">alert("Campeón modificado correctamente");</script>';
      // header("002campeones.php");        
      echo "<a class='btn btn-primary' href='002campeones.php'>Volver al listado</a>";

    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="/js/autModal.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Editar</title>
</head>
<body>
  
  <!-- Modal -->
  <div class="modal fade" id="modalEditando" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Info</h1>
        </div>
        <div class="modal-body">
          Campeón editado correctamente
        </div>
        <div class="modal-footer">
          <a href="002campeones.php">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          </a>
        </div>
      </div>
    </div>
  </div>

    
</body>
</html>


