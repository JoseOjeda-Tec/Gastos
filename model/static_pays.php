<?php

    setlocale(LC_ALL,"es_ES");
    class static_pays
    {

        private $static_pays;
        private $db;

        public function __construct(){
            $this->static_pays = array();
            $this->db = new Db();
        }

        public function getStaticPays(){

            $sql = "SELECT * FROM static_pays";
            foreach ($this->db->con($sql) as $res) {
                $this->static_pays[] = [
                    'id_static_pays' => $res['id_static_pays'], 
                    'descripcion' => $res['descripcion'], 
                    'class_color' => $res['class_color'], 
                    'Monto' => $res['Monto'], 
                    'dia_vencimiento' => $res['dia_vencimiento'], 
                    'id_bank' => $res['id_bank'],
                    'mes' => $res['mes'], 
                    'anio' => $res['anio'], 
                    'estado' => $res['estado'], 
                    'fecha_pago' => $res['fecha_pago'], 
                    'fecha_registro' => $res['fecha_registro']
                ];
            }
            return $this->static_pays;
            
        }

        public function getStaticPay($id){

            $sql = "SELECT * FROM static_pays WHERE id_static_pays = $id";
            foreach ($this->db->con($sql) as $res) {
                $this->static_pays[] = [
                    'id_static_pays' => $res['id_static_pays'], 
                    'descripcion' => $res['descripcion'], 
                    'class_color' => $res['class_color'], 
                    'Monto' => $res['Monto'], 
                    'dia_vencimiento' => $res['dia_vencimiento'], 
                    'id_bank' => $res['id_bank'],
                    'mes' => $res['mes'], 
                    'anio' => $res['anio'], 
                    'estado' => $res['estado'], 
                    'fecha_pago' => $res['fecha_pago'], 
                    'fecha_registro' => $res['fecha_registro']
                ];
            }
            return $this->static_pays;
            
        }

        public function getStaticPaysDetail($data){

            $bank = $data['bank'];
            $mes_input = $data['mes'];
            $anio_input = $data['anio'];

            $anio_input = $anio_input * 1 > 2000 ? "AND y.anio = $anio_input;" : "AND sp.anio = $anio_input;"; 

            $sql = "SELECT sp.*, b.descripcion AS desc_bank, b.tipo AS tipo_bank, y.anio AS desc_year 
                    FROM static_pays sp, banks b, years y
                    WHERE sp.id_bank = b.id_bank AND sp.anio = y.id_year AND b.id_bank = $bank AND sp.mes = '$mes_input' $anio_input";

            foreach ($this->db->con($sql) as $res) {
                $this->static_pays[] = [
                    'id_static_pays' => $res['id_static_pays'], 
                    'descripcion' => $res['descripcion'], 
                    'class_color' => $res['class_color'], 
                    'Monto' => $res['Monto'], 
                    'dia_vencimiento' => $res['dia_vencimiento'], 
                    'id_bank' => $res['id_bank'],
                    'mes' => $res['mes'], 
                    'anio' => $res['anio'], 
                    'estado' => $res['estado'], 
                    'fecha_pago' => $res['fecha_pago'], 
                    'fecha_registro' => $res['fecha_registro'], 
                    'desc_bank' => $res['desc_bank'], 
                    'tipo_bank' => $res['tipo_bank'], 
                    'desc_year' => $res['desc_year']
                ];
            }

            return $this->static_pays;

        }

        public function setStaticPays($data){

            $desc = $data['desc'];
            $class_color = $data['class_color'];
            $monto = $data['monto'];
            $dia_venc = $data['dia_venc'];
            $bank = $data['bank'];
            $mes_input = $data['mes'];
            $anio_input = $data['anio'];

            date_default_timezone_set('America/Santiago');
            $mes = date("n");
            $anio = date("Y");
            $dia = date("j");
            $mes = ($mes * 1) < 10 ? '0' . $mes : $mes;
            $dia = ($dia * 1) < 10 ? '0' . $dia : $dia;
            $fecha = $dia.'-'.$mes.'-'.$anio;
            $hora = date("H:i:s");
            $fecha_completa = "$fecha $hora";

            $sql  = "INSERT INTO static_pays(descripcion, class_color, Monto, dia_vencimiento, id_bank, mes, anio, estado, fecha_pago, fecha_registro)
                    VALUES ('$desc', '$class_color', $monto, $dia_venc, $bank, '$mes_input', '$anio_input', 0, '0', '$fecha_completa')";

            $result = $this->db->con($sql);
            if ($result) return 1;
            else return 0; 

        }

        public function updateState($data){

            $id_static = $data['id_static_pays'];
            $estado = $data['estado'];

            date_default_timezone_set('America/Santiago');
            $mes = date("n");
            $anio = date("Y");
            $dia = date("j");
            $mes = ($mes * 1) < 10 ? '0' . $mes : $mes;
            $dia = ($dia * 1) < 10 ? '0' . $dia : $dia;
            $fecha = $dia.'-'.$mes.'-'.$anio;
            $hora = date("H:i:s");
            $fecha_completa = "$fecha $hora";

            $sql  = "UPDATE static_pays SET estado = $estado, fecha_pago = '$fecha_completa' WHERE id_static_pays = $id_static";

            $result = $this->db->con($sql);
            if ($result) return 1;
            else return 0; 

        }

        public function updateStaticPays($data){

            $id_edit = $data['id_edit'];
            $desc = $data['desc'];
            $class_color = $data['class_color'];
            $monto = $data['monto'];
            $dia_venc = $data['dia_venc'];
            $bank = $data['bank'];
            $mes_input = $data['mes'];
            $anio_input = $data['anio'];

            $sql  = "UPDATE static_pays SET  descripcion = '$desc', class_color = '$class_color', Monto = $monto, dia_vencimiento = $dia_venc, id_bank = $bank, mes = '$mes_input', anio = $anio_input WHERE id_static_pays = $id_edit";

            $result = $this->db->con($sql);
            if ($result) return 1;
            else return 0; 

        }
        
    }
    
?>