<?php

include "../../config/config.php";

class Types{
    const SELECT = 1;
    const INSERT = 2;
    const SELECT_WHERE = 3;
    const SELECT_ORDER = 4;

    const AND = 10;
    const OR = 11;
}

class Database {

    public $error = "";
    private $pdo = null;
    private $stmt = null;

    private $table_name = null;
    private $query_type = 1;

    private $select_columns = null;
    private $select_where = null;
    private $select_where_type = null;

    private $select_order_by = null;

    private $insert_data = null;

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
            $this->stmt->execute($values);
            return $this->pdo->lastInsertId();
        } catch (Exception $ex) {
            $this->error= $ex->getMessage();
            echo $this->error;
            return false;
        }
    }

    function insert($table){
        $this->query_type = Types::INSERT;
        $this->table_name = $table;

        return $this;
    }

    function values($values){
        $this->insert_data = $values;

        return $this;
    }

    function select($columns){
        $this->query_type = Types::SELECT;
        $this->select_columns = $columns;

        return $this;
    }

    function from($table){
        $this->table_name = $table;

        return $this;
    }

    function where_and($where){
        $this->query_type = Types::SELECT_WHERE;
        $this->select_where = $where;
        $this->select_where_type = Types::AND;

        return $this;
    }

    function where_or($where){
        $this->query_type = Types::SELECT_WHERE;
        $this->select_where = $where;
        $this->select_where_type = Types::OR;

        return $this;
    }

    function order_by($order){
        $this->query_type = Types::SELECT_ORDER;
        $this->select_order_by = $order;

        return $this;
    }

    function insertion(){

        
        $columns = array();
        $vals = array();
        $marks = array();

        foreach ($this->insert_data as $key => $value){
            $columns[] = $key;
            $vals[] = $value;
            $marks[] = "?";
        }

        $query = "INSERT INTO `+table` (+values) VALUES(+qs)";
        $find = array("+table", "+values", "+qs");
        $replace = array($this->table_name, implode(",", $columns), implode(",", $marks));
        $query = str_replace($find, $replace, $query);

        return $this->run_query_return($query, $vals);
    } 

    function selection_where(){

        $conjunction = " AND ";
        if($this->select_where_type == Types::OR){
            $conjunction = " OR ";
        }

        $vals = array();
        $statements = array();

        foreach ($this->select_where as $key => $value){
            $statements[] = $key."=?";
            $vals[] = $value;
        }

        $query = "SELECT +columns FROM `+table` WHERE +statements";
        $find = array("+table", "+columns", "+statements");
        $replace = array($this->table_name, implode(",", $this->select_columns), implode($conjunction, $statements));
        $query = str_replace($find, $replace, $query);

        return $this->run_query($query, $vals);
    }

    function selection_where_order(){

        $conjunction = " AND ";
        if($this->select_where_type == Types::OR){
            $conjunction = " OR ";
        }

        $vals = array();
        $statements = array();

        foreach ($this->select_where as $key => $value){
            $statements[] = $key."=?";
            $vals[] = $value;
        }

        $query = "SELECT +columns FROM `+table` WHERE +statements ORDER BY +orders";
        $find = array("+table", "+columns", "+statements", "+orders");
        $replace = array($this->table_name, implode(",", $this->select_columns), implode($conjunction, $statements), implode(",", $this->select_order_by));
        $query = str_replace($find, $replace, $query);

        return $this->run_query($query, $vals);
    }

    function clear_values(){
        $this->table_name = null;
        $this->query_type = 1;

        $this->select_columns = null;
        $this->select_where = null;
        $this->select_where_type = null;

        $this->insert_data = null;

        $this->select_order_by = null;
    }

    function go(){
        $return_value = null;

        switch($this->query_type){
            case Types::INSERT:
                $return_value = $this->insertion();
                break;
            case Types::SELECT:
                break;
            case Types::SELECT_WHERE:
                $return_value = $this->selection_where();
                break;
            case Types::SELECT_ORDER:
                $return_value = $this->selection_where_order();
                break;
        }

        $this->clear_values();
        return $return_value;
    }

}

?>