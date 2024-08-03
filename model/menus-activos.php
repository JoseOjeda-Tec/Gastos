<?php

    class menus_activos
    {

        private $menus_activos;
        private $db;

        public function __construct(){
            $this->menus_activos = array();
            $this->db = new Db();
        }

        public function getMenusActivos(){

            $sql = "SELECT menu, activo FROM menus_activos";
            foreach ($this->db->con($sql) as $res) {
                $this->menus_activos[] = [$res['menu'] => $res['activo']];
            }
            return $this->menus_activos;
            
        }

        public function updateMenusActivos($data){

            $month = $data['month'];
            $year = $data['year'];
            $bank = $data['bank'];

            $sql = "UPDATE menus_activos SET activo = '$month' WHERE menu = 'month';";
            $sql .= "UPDATE menus_activos SET activo = '$year' WHERE menu = 'slc-year';";
            $sql .= "UPDATE menus_activos SET activo = '$bank' WHERE menu = 'slc-bank';";
            
            $result = $this->db->con($sql);
            if ($result) return 1;
            else return 0; 

        }
        
    }
    

?>