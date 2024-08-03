<?php 

    require_once("../model/db.php");
    require_once("../model/static_pays.php");

    $static_pays = new static_pays();

    header('Content-Type: application/json');
    $data_input = json_decode(file_get_contents('php://input'), true);

    switch ($data_input['accion']) {

        case "getStaticPay":

            $array_data = $static_pays->getStaticPay($data_input['id']);
            echo json_encode($array_data);

        break;

        case "getStaticPaysDetail":

            $data = [
                'bank' => $data_input['bank'],
                'mes' => $data_input['meses'],
                'anio' => $data_input['anios']
            ];

            $array_data = $static_pays->getStaticPaysDetail($data);
            echo json_encode($array_data);

        break;

        case "setStaticPays":

            $data = [
                'desc' => $data_input['desc'],
                'class_color' => $data_input['class_color'],
                'monto' => $data_input['monto'],
                'dia_venc' => $data_input['dia_venc'],
                'bank' => $data_input['bank'],
                'mes' => $data_input['mes'],
                'anio' => $data_input['anio']
            ];

            $response = $static_pays->setStaticPays($data);

            $resp_json = [
                "respuesta" => $response == 1 ? 1 : 0,
                "mensaje" => $response == 1 ? "Consulta exitosa" : "Error en la consulta"
            ];

            echo json_encode($resp_json);

        break;
        
        case "updateState":

            $data = [
                'id_static_pays' => $data_input['id_static_pays'],
                'estado' => $data_input['estado']
            ];

            $response = $static_pays->updateState($data);

            $resp_json = [
                "respuesta" => $response == 1 ? 1 : 0,
                "mensaje" => $response == 1 ? "Consulta exitosa" : "Error en la consulta"
            ];

            echo json_encode($resp_json);

        break;

        case "updateStaticPays":

            $data = [
                'id_edit' => $data_input['id_edit'],
                'desc' => $data_input['desc'],
                'class_color' => $data_input['class_color'],
                'monto' => $data_input['monto'],
                'dia_venc' => $data_input['dia_venc'],
                'bank' => $data_input['bank'],
                'mes' => $data_input['mes'],
                'anio' => $data_input['anio']
            ];

            $response = $static_pays->updateStaticPays($data);

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