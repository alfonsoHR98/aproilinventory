<?php
    include '../conn.php';

    //inyección sql
    $sql = "SELECT * from productos";
  
    //se extrae la información de la base de datos con la inyección sql necesaria
    $result = mysqli_query($conn, $sql);
  
    if($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()){
          $id = $row["id_cliente"];
          $nombre = $row["nombre"];
          $rfc = $row["rfc"];
          $correoele = $row["correo"];
          echo "
            <tr>
              <td>$id</td>
              <td>$nombre</td>
              <td>$rfc</td>
              <td>$correoele</td>
            </tr>
          ";
        }
        $result->free();
        $conn->close();
      }
?>