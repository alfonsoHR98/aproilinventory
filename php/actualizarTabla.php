<?php
    $option = $_POST['option'];
    $updatedData = getUpdatedData($option);

    $html = '';
    foreach ($updatedData as $row){
        $html .= "<tr>";
        foreach($row as $cell){
            $html .= "<td>{'HOLA'}</td>";
        }
        $html .= "</tr>";
    }
    echo $html;
?>