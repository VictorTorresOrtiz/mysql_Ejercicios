
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campeones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php
        require_once './conexionDB.php';
        
        $consulta="SELECT * FROM champ;";
        $listachamp = mysqli_query($conn, $consulta);

        echo "<ul>";
        foreach($listachamp as $campeon){
            echo "<li>";

                echo "$campeon[name] ---- $campeon[rol] 
                <button><a class='btn btn-primary' href='003editando.php?id=$campeon[id]'>Editar Info</a></button>

                <button><a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal$campeon[id]'>Borrar</a></button>
                <div class='modal fade' id='exampleModal$campeon[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>Vas aborrar la informacion de $campeon[name] ¿Estas seguro?</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                        <a type='button' class='btn btn-primary' href='003borrar.php?id=$campeon[id]'>Aceptar</a>
                    </div>
                    </div>
                </div>
                </div>";

            echo "</li>";
        }
        echo "</ul>";
?>  
</body>
</html>
