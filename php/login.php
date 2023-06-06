<?php
  //se manda a llamar la conexión a la base de datos
  include '../conn.php';

  //inyección sql
  $sql = "SELECT * from usuarios";

  //se extrae la información de la base de datos con la inyección sql necesaria
  $result = mysqli_query($conn, $sql);

  //variables traídas del formulario
  $usuario = $_POST["user"];
  $password = $_POST["password"];

  if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
      if ($fila['usuario'] == $usuario && $fila['password'] == $password) {
        header("Location: ../dashboard.html");
        exit();
      }else{
        header("Location: ../index.html");
      }
    }
  }

  mysqli_close($conn);
?>