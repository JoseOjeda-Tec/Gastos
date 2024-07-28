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
            return 'prueba';
        }
        
    }
    

?>