<?php

class Donor{

    private $database = null;

    function __construct () {
        $this->database = new Database();
    }

    function get_donors_by_userid($user_id){
        return $this->database->select(array("donor_id", "user_id"))->from("donor_accounts")->where_and(array("user_id" => $user_id))->order_by(array("donor_id DESC"))->go();
    }

    function insert_new_donor($data){
        $this->database->insert("donor_accounts")->values($data)->go();
        return $this->get_donors_by_userid($data["user_id"]);
    }

    function add_post($donor_id,$data){
        $id = $this->database->insert("posts")->values($data)->go();
        return $this->database->insert("donor_post_owners")->values(array("donor_id" => $donor_id, "post_id"=>$id))->go();
    }

    function get_funds(){
        return $this->database->select(array("*"))->from("funds")->where_and(array("1" => "1"))->go();
    }

    function get_posts(){
        return $this->database->select(array("*"))->from("posts")->where_and(array("1" => "1"))->go();
    }
}

?>