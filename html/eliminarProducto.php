<!--<!DOCTYPE html>
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
</html>  -->

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Actualizar varias filas con CheckBox en PHP usando Ajax | BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Actualizar varias filas con CheckBox en PHP usando Ajax</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
   <div class="table-responsive">  
<form method="post" id="update_form">
<div align="right" style="margin:5px;">
<button name="multiple_update" id="multiple_update" class="btn btn-primary">Actualizacion Multiple</button>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-dark">
    <th width="4%"></th>
    <th width="18%">Nombres</th>
    <th width="22%">Direccion</th>
    <th width="14%">Genero</th>
    <th width="13%">Area</th>
    <th width="8%">Edad</th>
    <th width="11%">Estado</th>
</thead>
<tbody></tbody>
</table>
</div>
</form>
   </div>  
  </div>
 


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>