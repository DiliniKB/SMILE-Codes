<?php

class Giftee{

    private $database = null;

    function __construct () {
        $this->database = new Database();
    }

    function get_donors_by_userid($user_id){
        return $this->database->select(array("donor_id", "user_id"))->from("donor_accounts")->where_and(array("user_id" => $user_id))->order_by(array("donor_id DESC"))->go();
    }

    function add_fund($data){
        return$this->database->insert("funds")->values($data)->go();
    }

    function add_post($giftee_id,$data){
        return $this->database->insert("posts")->values($data)->go();
    }
}

?>