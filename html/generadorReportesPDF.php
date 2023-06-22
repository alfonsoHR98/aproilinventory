<?php
    include 'reportesPDF.php';
    require '../conn.php';

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $query = "SELECT id_usuario, usuario, nombres, apellidos, correo, password from usuarios";
    $result = $conn ->query($query);

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,6,'ID',1,0,'C',1);
    $pdf->Cell(70,6,'Usuario',1,0,'C',1);
    $pdf->Cell(70,6,'Correo',1,1,'C',1);

    //$pdf->SetFillColor(200,200,200); Cambia el color a las tablas parte de texto
    if($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()){
            $id = $row["id_usuario"];
            $nombre = $row["usuario"];
            $correoele = $row["correo"];
            $pdf->Cell(10,6,utf8_decode($id),1,0,'C');
            $pdf->Cell(70,6,utf8_decode($nombre),1,0,'C');
            $pdf->Cell(70,6,utf8_decode($correoele),1,1,'C');
        }
        $result->free();
        $conn->close();
    }
    $pdf->Output();
?>