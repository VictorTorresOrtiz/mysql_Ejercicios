<?php
   $servername = "localhost";
   $db = "lol";
   $username = "root";
   $password = "";
   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $db);
   // Check connection
   if (!$conn) {
       echo("Connection failed: " . mysqli_connect_error());
       exit();
   }   