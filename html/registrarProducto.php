<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APROIL</title>
  <link rel="stylesheet" type="text/css" href="../css/registrarProduct.css">
</head>
<body>
  <?php include('../php/menu.php'); ?>
  <div class="contenedor">
    <div class="chill-1">
      <h1>Registro de productos</h1>
      <div class="formulario">
        <form method="POST" action="../php/registroPRODUCTO.php">
          <label for="nombre"></label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto">
          <label for="unidad"></label>
          <input type="text" name="unidad" id="unidad" placeholder="Tipo de unidad">
          <label for="caracteristicas"></label>
          <textarea name="caracteristicas" id="caracteristicas" placeholder="Características del producto"></textarea>
          <div class="btn"><input type="submit" value="REGISTRAR" class="button"></div>
        </form>
      </div>
    </div>
    <div class="chill-2">
      <?php
        include('../conn.php');
        $sql = "SELECT * FROM productos";
        echo "<h1>PRODUCTOS REGISTRADOS</h1>";
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>PRODUCTO</th>
                  <th>DESCRIPCIÓN</th>
                </tr>";
        if($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()){
            $id = $row["id_producto"];
            $producto = $row["nombre"];
            $descripcion = $row["caracteristicas"];
            echo "
              <tr>
                <td>$id</td>
                <td>$producto</td>
                <td>$descripcion</td>
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