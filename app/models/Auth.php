<?php

class Auth{

    private $database = null;

    function __construct () {
        $this->database = new Database();
    }

    function get_users_by_email($email){
        return $this->database->select(array("user_id"))->from("users")->where_and(array("email" => $email))->go();
    }

    function get_data_by_email($email){
        return $this->database->select(array("user_id", "email", "password"))->from("users")->where_and(array("email" => $email))->go();
    }

    function check_exsisting_users($email, $nic){
        return $this->database->select(array("user_id", "email", "nic"))->from("users")->where_or(array("email" => $email, "nic" =>$nic))->go();
    }

    function insert_new_user($data){
        $this->database->insert("users")->values($data)->go();
        return $this->get_users_by_email($data["email"]);
    }

    function get_user_by_id($user_id){
        return $this->database->select(array("user_id", "first_name", "last_name", "nic", "email"))->from("users")->where_and(array("user_id" => $user_id))->go();
    }
}


?>