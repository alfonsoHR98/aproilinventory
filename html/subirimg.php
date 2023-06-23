<!DOCTYPE html>
<html>
<head>
    <title>Formulario de inserción</title><style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Formulario de inserción</h1>
    <form action="../php/insertimg.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <h2>Generar reporte</h2>
    <form action="pdfimagen.php" method="post">
        <label for="nombre"></label>
        <?php
            include('../conn2.php');
            $sql = "SELECT * FROM pruebainsert";
            if($result = $conn->query($sql)) {
            echo '<select id="selectOption">';
            while ($row = $result->fetch_assoc()){
                echo '<option value="' . $row["id_pruebainsert"] . '">' . $row["nombre"] . '</option>';
            }
            echo '</select>';
            } else{
            echo 'No se encontraron opciones';
            }
        ?>
    <input type="submit" value="Generar PDF">

    </form>

    <h2>Inserciones recientes:</h2>
    <?php
    // Conexión a la base de datos (reemplaza los valores con los de tu entorno)
    include '../conn2.php';

    // Verificar la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Realizar la consulta para obtener las inserciones
    $sql = "SELECT * FROM pruebainsert";
    $result = mysqli_query($conn, $sql);

    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los datos en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Imagen</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_pruebainsert'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td> <img src='". ($row['imagen']). "' height='auto' width='150'  ></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron inserciones.";
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>
</body>
</html>
