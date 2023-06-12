<?php 
  include('../conn.php');
  $producto = $_POST["nombre"];
  $unidad = $_POST["unidad"];
  $descripcion = $_POST["caracteristicas"];

  $sql = "INSERT INTO productos (nombre, unidad, caracteristicas) VALUES ('$producto','$unidad','$descripcion')";

  if($conn->query($sql)){
    echo "<script>alert('Registro exitoso');</script>";
    $conn->close();
    header("Location: ../html/registrarProducto.php");
  }else{
    echo "<script>alert('Fallo al registrar');</script>";
    $conn->close();
    header("Location: ../html/registrarProducto.php");
  }
?>