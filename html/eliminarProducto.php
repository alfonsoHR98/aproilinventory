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
      <h1>Busqueda de productos</h1>
      <?php
        include('../conn.php');
        $sql = "SELECT * FROM productos";
        if($result = $conn->query($sql)) {
          echo '<select id="selectOption">';
          while ($row = $result->fetch_assoc()){
            echo '<option value="' . $row["id_producto"] . '">' . $row["nombre"] . '</option>';
          }
          echo '</select>';
        } else{
          echo 'No se encontraron opciones';
        }
      ?>
      <button id="updateButton">Buscar</button>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.7/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
          $("#selectOption").change(function(){
            var option = $(this).val();
            updateTable(option);
          });

          $("#updateButton").click(function(){
            var option = $("selectOption").val();
            updateTable(option);
          });

          function updateTable(option){
            $.ajax({
              url: "../php/actualizarTabla.php",
              method:"POST",
              data: {option:option},
              success: function(data){
                $("dataTable").html(data);
              }
            });
          }
        });
      </script>
    </div>
    <div class="chill-2">
      <h1>PRODUCTOS REGISTRADOS</h1>
      <table id="dataTable">
        <tr>
          <th>ID</th>
          <th>PRODUCTO</th>
          <th>DESCRIPCIÓN</th>
        </tr>
        <tr>
          <td>id</td>
          <td>producto</td>
          <td>descripcion</td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>