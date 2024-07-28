<?php

    class years
    {

        private $years;
        private $db;

        public function __construct(){
            $this->years = array();
            $this->db = new Db();
        }

        public function getYears(){

            $sql = "SELECT * FROM years";
            foreach ($this->db->con($sql) as $res) {
                $this->years[] = ['id_year' => $res['id_year'], 'anio' => $res['anio']];
            }
            return $this->years;
            
        }
        
    }
    
?>