<?php
require 'conexion.php';

$username = $_POST['usernametxt'];
$name = $_POST['nametxt'];
$email = $_POST['emailtxt'];
$password = $_POST['pss'];

//Validaciones

    if (empty($username)){
        $errMsg  = 'Introduce un Nick correcto';
    } else if (empty($nombre)){
        $errMsg  = 'Introduce un Nombre correcto';

    } else if (empty($email)){
        $errMsg  = 'Formato Incorrecto';

    } else if (empty($password)){
        $errMsg  = 'Contraseña incorrecta';

    }

    if ($errMsg == '') {
    try {
        $stmt = $connect->prepare('INSERT INTO users (`name`, username, email, `password`) VALUES (:`name`, :username, :email,  :`password`)');
        $stmt->execute(
            array(
                ':name' => $name,
                ':username' => $username,
                ':email' => $email,
                ':password' => $password,
            )
        );

        header('Location: 007nuevoUsuario.php');
        exit();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    }

    








?>