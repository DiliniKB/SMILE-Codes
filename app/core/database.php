<?php

    Class Database
    {
        public function db_connect()
        {
            try {
                $string = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";";
                $db = new PDO($string,DB_USER,DB_PASS);
                return $db;

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function read($query, $data = [])
        {
            $DB = $this->db_connect();
            $stm = $DB->prepare($query);
            // echo $stm;

            if (count($data)<1) {
                $stm = $DB->query($query);
                $check=0;
                if ($stm) {
                    $check=1;
                }
            }else{
                $check = $stm->execute($data);
            }
            
            if ($check) 
            {
                return $stm->fetchAll(PDO::FETCH_OBJ);

            }else{

                echo "error";
                return false;
            }
        }

        public function write($query, $data = [])
        {
            $DB = $this->db_connect();
            $stm = $DB->prepare($query);

            show($data);

            if (count($data)<1) {
                $stm = $DB->query($query);
                $check=0;
                if ($stm) {
                    $check=1;
                }
            }else{
                $check = $stm->execute($data);
            }
            
            if ($check) 
            {
                return true;

            }else{
                
                return false;
            }
        }
    }
?>