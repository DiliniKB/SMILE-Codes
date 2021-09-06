<?php

include "Database.php";

class Auth extends Database{

    private $database = null;

    function __construct () {
        $this->database = new Database();
    }

    function get_users_by_email($email){
        return $this->database->select_where_and("users",array("user_id"),array("email" => $email));
    }

    function get_data_by_email($email){
        return $this->database->select_where_and("users",array("user_id", "email", "password"),array("email" => $email));
    }

    function check_exsisting_users($email, $nic){
        return $this->database->select_where_or("users",array("user_id", "email", "nic"),array("email" => $email, "nic" =>$nic));
    }

    function insert_new_user($data){
        $this->database->insert("users",  $data);
        return $this->get_users_by_email($data["email"]);
    }

    function get_user_by_id($user_id){
        return $this->database->select_where_and("users",array("user_id", "first_name", "last_name", "nic", "email"),array("user_id" => $user_id));
    }
}


?>