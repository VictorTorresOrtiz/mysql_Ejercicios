<?php
require 'conexion.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
    <form action="006nuevoUsuario.php" method="POST">
        <div class="mb-3">
            <label for="usernametxt" class="form-label">Username</label>
            <input type="text" class="form-control" id="usernametxt" name="usernametxt" required>
            <!---Validaciones!-->




        </div>

        <div class="mb-3">
            <label for="nametxt" class="form-label">Name</label>
            <input type="text" class="form-control" id="nametxt" name="nametxt" required>
        </div>

        <div class="mb-3">
            <label for="emailtxt" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailtxt" name="emailtxt" required>
        </div>

        <div class="mb-3">
            <label for="pss" class="form-label">PassWord</label>
            <input type="password" class="form-control" id="pss" name="pss" required>
        </div>

        <button type="submit" class="btn btn-primary align-items-center" name="enviar">Submit</button>
    </form>
</body>
</html>