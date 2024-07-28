<?php 

    require_once("../model/db.php");
    require_once("../model/banks.php");

    $banks = new banks();

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['accion']) {
        case "getBanks":

            $array_data = $banks->getBanks();
            echo json_encode($array_data);

        break;
        
        default:
            # code...
            break;
    }

?>