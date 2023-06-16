<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APROIL</title>
  <link rel="stylesheet" type="text/css" href="../css/registrarProduct.css">
  <script type="text/javascript">
    function confirmar () {
      return confirm('¿Estas Seguro?, se eliminarán los datos');
    }
  </script>
</head>
<body>
  <?php include('../php/menu.php'); ?>
  <div class="contenedor">
    <div class="delete">
      <?php
        include('../conn.php');
        $sql = "SELECT * FROM clientes";
        echo "<h1>Editar - Eliminar</h1>";
        echo "<table>
                <tr>
                  <th>NOMBRE</th>
                  <th>RFC</th>
                  <th>TELÉFONO</th>
                  <th>CORREO</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                </tr>";
        if($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()){
            $id = $row["id_cliente"];
            $nombre = $row["nombre"];
            $rfc = $row["rfc"];
            $telefono = $row["telefono"];
            $correo = $row["correo"];
            echo "
              <tr>
                <td>$nombre</td>
                <td>$rfc</td>
                <td>$telefono</td>
                <td>$correo</td>
                <td><a>EDITAR</a></td>
                <td><a href='../php/eliminarCLIENTE.php?id=".$row["id_cliente"]."' onclick='return confirmar()'>ELIMINAR</a></td>
              </tr>
            ";
          }
          $result->free();
          $conn->close();
        }
        echo "</table>";
      ?>
    </div>
  </div>
</body>
</html>
