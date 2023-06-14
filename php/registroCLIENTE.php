<?php 
  include('../conn.php');
  $nombre = $_POST["nombre"];
  $direccion = $_POST["direccion"];
  $rfc = $_POST["rfc"];
  $telefono = $_POST["telefono"];
  $correo = $_POST["correo"];
  

  $sql = "INSERT INTO clientes (nombre, direccion, rfc, telefono, correo) VALUES ('$nombre','$direccion','$rfc','$telefono','$correo')";

  if($conn->query($sql)){
    echo "<script>alert('Registro exitoso');</script>";
    $conn->close();
    header("Location: ../html/registrarCliente.php");
  }else{
    echo "<script>alert('Fallo al registrar');</script>";
    $conn->close();
    header("Location: ../html/registrarCliente.php");
  }
?>