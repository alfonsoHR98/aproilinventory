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
      <form method="POST" action="" onclick="recargar()">
        <label for="opciones">Opciones:</label>
        <?php
          session_start();
          include('../conn.php');
          $sql = "SELECT * FROM productos";
          if ($result = $conn->query($sql)) {
            echo '<select id="seleccion" name="opciones">';
            while ($row = $result->fetch_assoc()) {
              $idProducto = $row["id_producto"];
              $nombreProducto = $row["nombre"];
              // Verificar si la opción coincide con la opción almacenada en la variable de sesión
              $selected = '';
              if (isset($_SESSION['opcion']) && $_SESSION['opcion'] == $idProducto) {
                $selected = 'selected';
              }
              echo '<option value="' . $idProducto . '" ' . $selected . '>' . $nombreProducto . '</option>';
            }
            echo '</select>';
          } else {
            echo 'No se encontraron opciones.';
          }
          $result->free();
          $conn->close();
        ?>
        <label for="nombre"></label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto">
        <div class="btn"><input type="submit" value="Buscar" class="button"></div>
      </form>

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si se ha seleccionado una opción
        if (isset($_POST['opciones'])) {
          // Obtener la opción seleccionada
          $opcionSeleccionada = $_POST['opciones'];

          // Guardar la opción seleccionada en la variable de sesión
          $_SESSION['opcion'] = $opcionSeleccionada;
        }
      }
      ?>
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
                if($selected == $producto){
                  echo "
                  <tr>
                    <td>$id</td>
                    <td>$producto</td>
                    <td>$descripcion</td>
                  </tr>
                ";
                }
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