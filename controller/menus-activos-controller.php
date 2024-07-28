<?php 

    require_once("../model/db.php");
    require_once("../model/menus-activos.php");

    $menus_activos = new menus_activos();

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['accion']) {
        case "getMenusActivos":

            $response = [
                'status' => 'success',
                'message' => 'Datos recibidos correctamente.',
                'receivedData' => $data
            ];

            // 
            echo json_encode($menus_activos->getMenusActivos());

        break;
        
        default:
            # code...
            break;
    }

?>