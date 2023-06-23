<?php
    include("../conn2.php");

    $sql = "SELECT * FROM pruebainsert";
    $result = mysqli_query($conn, $sql);
    $contcarpeta = 0;
    // Verificar si se obtuvieron resultados
    while ($row = mysqli_fetch_assoc($result)) {
        $contcarpeta = $row['id_pruebainsert'];
    }

    $contcarpeta = $contcarpeta + 1;
    $nombre1 = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = ' ';
    
    if(isset($_FILES["imagen"])){
        $file = $_FILES["imagen"];
        $nombre = $file["name"];
        if($nombre==""){
            $sql = "INSERT INTO pruebainsert (nombre, descripcion, imagen) 
            VALUES ('$nombre1', '$descripcion', '$imagen')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registro exitoso');</script>";
                $conn->close();
                header("Location: ../html/subirimg.php");
            } else {
                echo "<script>alert('Registro fallido');</script>";
                $conn->close();
                header("Location: ../html/subirimg.php");
            }
        }else{
            
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "../images/subidas/";
        
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg'
            && $tipo != 'image/png' && $tipo != 'image/png' && $tipo != 'image/gif'){
                echo "<script>alert('La imagen no tiene un formato correcto');</script>";
                $conn->close();
                //header("Location: ../html/subirimg.php");
            }else if($size > 3*1024*1024){
                echo "<script>alert('La imagen debe tener un peso maximo de 3MB');</script>";
                $conn->close();
                header("Location: ../html/subirimg.php");
            }else{
                if(!file_exists($carpeta)){
                    mkdir($carpeta);
                }
                $nombre="Usuario".$contcarpeta.".png";
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional,$src);
                $imagen = $carpeta.$nombre;

                $sql = "INSERT INTO pruebainsert (nombre, descripcion, imagen) 
                VALUES ('$nombre1', '$descripcion', '$imagen')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Registro exitoso');</script>";
                    $conn->close();
                    header("Location: ../html/subirimg.php");
                } else {
                    echo "<script>alert('Registro fallido');</script>";
                    $conn->close();
                    header("Location: ../html/subirimg.php");
                }
                // Cerrar la conexión
                $conn->close();
            }
        }
    }
?>