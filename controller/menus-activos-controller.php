<?php 

    require_once("../model/db.php");
    require_once("../model/menus-activos.php");

    $menus_activos = new menus_activos();

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['accion']) {
        case "getMenusActivos":

            $array_data = $menus_activos->getMenusActivos();

            $response = [
                'menu' => $array_data[0]['menu'],
                'month' => $array_data[1]['month'],
                'year' => $array_data[2]['slc-year'],
                'bank' => $array_data[3]['slc-bank']
            ];

            echo json_encode($response);

        break;
        
        default:
            # code...
            break;
    }

?>