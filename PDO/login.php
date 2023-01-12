<?php

  require_once '../db.php';

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
                header('location: html/dashboard.php');
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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>Login</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <!--   Core JS Files   -->
  <script defer src="./assets/js/core/popper.min.js"></script>
  <script defer src="./assets/js/core/bootstrap.min.js"></script>
  <script defer src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script defer src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script defer src="./assets/js/plugins/chartjs.min.js"></script>
  <script defer src="./assets/js/plugins/addons.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--parallax effects, scripts for the example pages etc -->
  <script defer src="./assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">

                  <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name ="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                      <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>

                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                      <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="register.php" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('./assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>