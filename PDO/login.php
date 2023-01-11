<?php

  require_once 'db.php';

  // Variables iniciales
  $email = $password = '';
  $email_err = $password_err = '';

  //Procesar post cuando se haga el submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitar el post (GRACIAS STACKOVERFLOW)
    $_POST = filter_input_array(INPUT_POST);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validar email
    if(empty($email)){
      $email_err = 'Please enter email';
    }

    // Validar contraeña
    if(empty($password)){
      $password_err = 'Please enter password';
    }

    // Comprobar si los errores están vacios
    if(empty($email_err) && empty($password_err)){
      // Prepare query
      $sql = 'SELECT name, email, password FROM users WHERE email = :email';

      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Intento de conexión
        if($stmt->execute()){
          // Mirar si el email existe
          if($stmt->rowCount() === 1){
            if($row = $stmt->fetch()){
              $hashed_password = $row['password'];
              if(password_verify($password, $hashed_password)){
                //Empezamos sesión todo correcto
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                header('location: index.php');
              } else {
                // Si la contraseña es erronea
                $password_err = 'The password you entered is not valid';
              }
            }
          } else {
            $email_err = 'No account found for that email';
          }
        } else {
          die('Something went wrong');
        }
      }

      unset($stmt);
    }

    // Cerramos conexión
    unset($pdo);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  <title>Login</title>
</head>
<body class="bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Login</h2>
          <p>Fill in your credentials</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">   
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="submit" value="Login" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="register.php" class="btn btn-light btn-block">No account? Register</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>