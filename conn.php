<?php
  // Realizar la conexión a la base de datos
  $servername = "192.168.15.11:3306";
  $username = "alfonso";
  $password = "";
  $dbname = "aproil";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if (!$conn) {
      die("Error de conexión: " . $conn->connect_error);
  }
?>