<?php 

    require_once("../model/db.php");
    require_once("../model/years.php");

    $years = new years();

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['accion']) {
        case "getYears":

            $array_data = $years->getYears();
            echo json_encode($array_data);

        break;
        
        default:
            # code...
            break;
    }

?>