<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APROIL</title>
  <link rel="stylesheet" type="text/css" href="../css/registrarSuppliers.css">
</head>
<body>
  <script>
  function validarFormulario(){
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    var rfc = document.getElementById("rfc").value;
    var telefono = document.getElementById("telefono").value;
    var correo = document.getElementById("correo").value;

    if (nombre === "" || direccion === "" || rfc === "" || telefono === "" || correo === ""){
      alert("Complete todos los campos");
      return false;
    }
    var nomregex = /^[a-zA-Z\s]+$/;
    if(!nomregex.test(nombre)){
      alert("El nombre tiene numero o un formato incorrecto");
      return false;
    }
    var dirregex = /^[a-zA-Z0-9\s\.,#-]+$/;
    if(!dirregex.test(direccion)){
      alert("La dirreción tiene un formato incorrecto");
      return false;
    }
    var rfcregex = /^[A-Z]{4}\d{6}[A-Z0-9]{3}$/;
    if(!rfcregex.test(rfc)){
      alert("El RFC no tiene el formato correcto");
      return false;
    }
    var numregex = /^\d{10}$/;
    if(!numregex.test(telefono)){
      alert("El numero de telefono es incorrecto");
      return false;
    }
    var corregex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!corregex.test(correo)){
      alert("El correo tiene un formato incorrecto");
      return false;
    }

    return true;
  }
  </script>
  <?php include('../php/menu.php'); ?>
  <div class="contenedor">
    <div class="chill-1">
      <h1>Registro de proveedores</h1>
      <div class="formulario">
        <form method="POST" action="../php/registroPROVEEDOR.php">
        <div class="saltolinea">
            <label for="nombre"></label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del cliente">
            <label for="direccion"></label>
            <input type="text" name="direccion" id="direccion" placeholder="Dirección del cliente">
          </div>
          <div class="saltolinea">
            <label for="rfc"></label>
            <input type="text" name="rfc" id="rfc" placeholder="RFC del cliente">
            <label for="telefono"></label>
            <input type="text" name="telefono" id="telefono" placeholder="Escriba el teléfono del cliente">
          </div>
          <div class="saltolinea">
            <label for="correo"></label>
            <input type="text" name="correo" id="correo" placeholder="Escriba el correo del cliente">
          </div>
          <div class="btn"><input type="submit" value="REGISTRAR" class="button"></div>
          </form>
      </div>
    </div>
    <div class="chill-2">
      <?php
        include('../conn.php');
        $sql = "SELECT * FROM proveedores";
        echo "<h1>PROVEEDORES REGISTRADOS</h1>";
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>RFC</th>
                  <th>CORREO ELECTRONICO</th>
                </tr>";
        if($result = $conn->query($sql)) {
          while ($row = $result->fetch_assoc()){
            $id = $row["id_proveedor"];
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