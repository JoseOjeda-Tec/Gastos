<?php

    class banks
    {

        private $banks;
        private $db;

        public function __construct(){
            $this->banks = array();
            $this->db = new Db();
        }

        public function getBanks(){

            $sql = "SELECT * FROM banks";
            foreach ($this->db->con($sql) as $res) {
                $this->banks[] = ['id_bank' => $res['id_bank'], 'descripcion' => $res['descripcion'], 'tipo' => $res['tipo']];
            }
            return $this->banks;
            
        }
        
    }
    
?>