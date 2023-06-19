<?php
  $id=$_GET['id'];
  include("../conn.php");

  $sql = "DELETE FROM clientes WHERE id_cliente='$id'";

  if($conn -> query($sql)) {
    header("Location: ../html/configuracionCLIENTES.php");
  }else{
    header("Location: ../html/configuracionCLIENTES.php");
  }
?>