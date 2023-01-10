<?php
    require 'conexion.php';


    //Validaciones inicializadas
    $name = $username = $email = $password = '';
    $name_err = $username_err = $email_err = $password_err = '';

    //Posteo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize POST --> Mediante FILTER_SANITIZE_STRING eliminamos etiquetas especiales
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //Variables
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //Validaciones de email

    if (empty($email)) {
        $email_err = 'Introduce su email';
    } else {
        $sql = 'SELECT id FROM users WHERE username = :email';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Ejecutamos y comprobamos si el email ya existe
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    $email_err = 'Email no esta disponible';
                }
            } else {
                die('ERROR DESCONOCIDO');
            }
        }
        unset($stmt);
    }

    //Validar nombre

    if (empty($name)) {
        $name_err = 'Introducir nombre';
    }

    //Validar Username

    if (empty($username)) {
        $username_err = 'Introduce Username';
    } else {
        $sql = 'SELECT id FROM users WHERE username = :username';
    }
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            // Ejecutamos y comprobamos si el usernam ya existe
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    $username_err = 'Username no esta disponible';
                }
            } else {
                die('ERROR DESCONOCIDO');
            }
        }
        unset($stmt);
    }

      //Validar Contraseña






  
