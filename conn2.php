<?php
  // Realizar la conexión a la base de datos
  $servername = "192.168.15.11:3307";
  $username = "manuel";
  $password = "1234";
  $dbname = "pruebaproil";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if (!$conn) {
      die("Error de conexión: " . $conn->connect_error);
  }
?>