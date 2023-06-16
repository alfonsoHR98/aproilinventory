<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/clientes.css">
  <title>APROIL</title>
</head>
<body>
  <?php include('../php/menu.php'); ?>
  <div class="contenedor">
    <div class="chill-1">
      <h1>Registro de clientes</h1>
      <div class="formulario">
        <form method="POST" action="../php/registroCLIENTE.php">
          <div class="saltolinea">
            <label for="nombre"></label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <label for="direccion"></label>
            <input type="text" name="direccion" id="direccion" placeholder="Dirección">
          </div>
          <div class="saltolinea">
            <label for="rfc"></label>
            <input type="text" name="rfc" id="rfc" placeholder="RFC">
            <label for="telefono"></label>
            <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
          </div>
          <div class="saltolinea">
            <label for="correo"></label>
            <input type="text" name="correo" id="correo" placeholder="Correo">
          </div>
          <div class="btn"><input type="submit" value="REGISTRAR" class="button"></div>
          </form>
      </div>
    </div>
    <div class="chill-2">
      <?php
        include('../conn.php');
        $sql = "SELECT * FROM clientes";
        echo "<h1>CLIENTES REGISTRADOS</h1>";
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>RFC</th>
                  <th>CORREO ELECTRONICO</th>
                </tr>";
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
        echo "</table>";
      ?>
    </div>
  </div>
</body>
</html>