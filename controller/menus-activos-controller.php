<?php 

    require_once("../model/db.php");
    require_once("../model/menus-activos.php");

    $menus_activos = new menus_activos();

    header('Content-Type: application/json');
    $data_input = json_decode(file_get_contents('php://input'), true);

    switch ($data_input['accion']) {
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

        case "updateMenusActivos":

            $data = [
                'month' => $data_input['month'],
                'year' => $data_input['years'],
                'bank' => $data_input['bank']
            ];

            $response = $menus_activos->updateMenusActivos($data);

            $resp_json = [
                "respuesta" => $response == 1 ? 1 : 0,
                "mensaje" => $response == 1 ? "Consulta exitosa" : "Error en la consulta"
            ];

            echo json_encode($resp_json);

        break;
        
        default:
            # code...
            break;
    }

?>