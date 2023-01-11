<?php

  require_once 'db.php';

  // Variables hardcodeadas
  $name = $email = $password = $confirm_password = '';
  $name_err = $email_err = $password_err = $confirm_password_err = '';

  // Procesar info del post 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitar POST (GRACIAS STACKOVERFLOW)
    $_POST = filter_input_array(INPUT_POST);

    $name =  trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validar email
    if(empty($email)){
      $email_err = 'Please enter email';
    } else {
      // El select
      $sql = 'SELECT id FROM users WHERE email = :email';

      if($stmt = $pdo->prepare($sql)){
        // Bind variables
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if($stmt->execute()){
          // Comprobar si el email existe
          if($stmt->rowCount() === 1){
            $email_err = 'Email is already taken';
          }
        } else {
          die('Something went wrong');
        }
      }

      unset($stmt);
    }

    // Validar nombre
    if(empty($name)){
      $name_err = 'Please enter name';
    }

    // Validar contraseña
    if(empty($password)){
      $password_err = 'Please enter password';
    } elseif(strlen($password) < 6){
      $password_err = 'Password must be at least 6 characters ';
    }

    // Validar Confirma contraseña
    if(empty($confirm_password)){
      $confirm_password_err = 'Please confirm password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords do not match';
      }
    }

    // Comprar si los errores están vacios
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password (Crea una contraseña encriptada mediante un algoritmo)
      $password = password_hash($password, PASSWORD_DEFAULT);

      // El insert
      $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

      if($stmt = $pdo->prepare($sql)){
        // Bind params
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        if($stmt->execute()){
          header('location: login.php');
        } else {
          die('Something went wrong');
        }
      }
      unset($stmt);
    }

    // Cerrar conexión
    unset($pdo);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <title>Register An Account</title>
</head>
<body class="bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Create Account</h2>
          <p>Fill in this form to register</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
              <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
              <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-row">
              <div class="col">
                <input type="submit" value="Register" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="login.php" class="btn btn-light btn-block">Have an account? Login</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
