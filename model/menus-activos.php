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
        
    }
    

?>