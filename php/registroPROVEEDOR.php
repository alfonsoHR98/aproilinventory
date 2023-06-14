<?php 
  include('../conn.php');
  $nombre = $_POST["nombre"];
  $rfc = $_POST["rfc"];
  $telefono = $_POST["telefono"];
  $direccion = $_POST["direccion"];
  $correo = $_POST["correo"];

  $sql = "INSERT INTO proveedores (nombre, direccion, rfc, telefono, correo) VALUES ('$nombre','$direccion','$rfc','$telefono','$correo')";

  if($conn->query($sql)){
    echo "<script>alert('Registro exitoso');</script>";
    $conn->close();
    header("Location: ../html/registrarProveedor.php");
  }else{
    echo "<script>alert('Fallo al registrar');</script>";
    $conn->close();
    header("Location: ../html/registrarProveedor.php");
  }
?>