<?php

  session_start();

  // Unset a todos los valores de sesión
  $_SESSION = array();

  // Destruir sesión
  session_destroy();

  // Redirigir al login
  header('location: login.php');
  exit;
  