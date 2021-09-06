<?php

include "../../config/config.php";

class Database {

    public $error = "";
    private $pdo = null;
    private $stmt = null;

    function __construct () {
        try {
            $this->pdo = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (Exception $ex) { die($ex->getMessage()); }

    }

    function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    function run_query($query, $values){
        try {
            $this->stmt = $this->pdo->prepare($query);
            $this->stmt->execute($values);
            $result = $this->stmt->fetchAll();
            return $result;
        } catch (Exception $ex) {
            $this->error= $ex->getMessage();
            echo $this->error;
            return false;
        }
    }

    function run_query_return($query, $values){
        try {
            $this->stmt = $this->pdo->prepare($query);
            return $this->stmt->execute($values);
        } catch (Exception $ex) {
            $this->error= $ex->getMessage();
            echo $this->error;
            return false;
        }
    }

    function insert($table, $data){

        
        $columns = array();
        $vals = array();
        $marks = array();

        foreach ($data as $key => $value){
            $columns[] = $key;
            $vals[] = $value;
            $marks[] = "?";
        }

        $query = "INSERT INTO `+table` (+values) VALUES(+qs)";
        $find = array("+table", "+values", "+qs");
        $replace = array($table, implode(",", $columns), implode(",", $marks));
        $query = str_replace($find, $replace, $query);

        return $this->run_query_return($query, $vals);
    }

    function select_where_and($table, $columns, $where){

        
        $vals = array();
        $statements = array();

        foreach ($where as $key => $value){
            $statements[] = $key."=?";
            $vals[] = $value;
        }

        $query = "SELECT +columns FROM `+table` WHERE +statements";
        $find = array("+table", "+columns", "+statements");
        $replace = array($table, implode(",", $columns), implode(" AND ", $statements));
        $query = str_replace($find, $replace, $query);

        return $this->run_query($query, $vals);
    }

    function select_where_or($table, $columns, $where){

        
        $vals = array();
        $statements = array();

        foreach ($where as $key => $value){
            $statements[] = $key."=?";
            $vals[] = $value;
        }

        $query = "SELECT +columns FROM `+table` WHERE +statements";
        $find = array("+table", "+columns", "+statements");
        $replace = array($table, implode(",", $columns), implode(" OR ", $statements));
        $query = str_replace($find, $replace, $query);

        return $this->run_query($query, $vals);
    }
}

?>