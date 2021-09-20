<?php

class Account{

    private $database = null;

    function __construct () {
        $this->database = new Database();
    }

    function get_donors_by_donorid($donor_id){
        return $this->database->select(array("donor_id", "user_id", "display_name"))->from("donor_accounts")->where_and(array("donor_id" => $donor_id))->go();
    }

    function get_giftees_by_gifteeid($giftee_id){
        return $this->database->select(array("giftee_id", "user_id", "display_name"))->from("giftee_accounts")->where_and(array("giftee_id" => $giftee_id))->go();
    }

    function get_organizations_by_organizationid($organization_id){
        return $this->database->select(array("organization_id", "display_name"))->from("organization_accounts")->where_and(array("organization_id" => $organization_id))->go();
    }

    function get_admins_by_adminid($admin_id){
        return $this->database->select(array("admin_id", "user_id", "display_name"))->from("admin_accounts")->where_and(array("admin_id" => $admin_id))->go();
    }

    function insert_donor($data){
        return $this->database->insert("donor_accounts")->values($data)->go();
    }

    function insert_giftee($data){
        return $this->database->insert("giftee_accounts")->values($data)->go();
    }

    function get_insert_organizations_by_userid($user_id){
        return $this->database->select(array("donor_id", "user_id"))->from("donor_accounts")->where_and(array("user_id" => $user_id))->order_by(array("donor_id DESC"))->go();
    }

    function insert_organization($data, $user_id){
        $id = $this->database->insert("organization_accounts")->values($data)->go();
        return $this->database->insert("organization_owners")->values(array("user_id"=> $user_id, "organization_id" => $id))->go();
    }

    function get_donors_by_userid($user_id){
        return $this->database->select(array("donor_id", "user_id", "display_name"))->from("donor_accounts")->where_and(array("user_id" => $user_id))->go();
    }

    function get_giftees_by_userid($user_id){
        return $this->database->select(array("giftee_id", "user_id", "display_name"))->from("giftee_accounts")->where_and(array("user_id" => $user_id))->go();
    }

    function get_organizations_by_userid($user_id){
        return $this->database->select(array("organization_id", "user_id"))->from("organization_owners")->where_and(array("user_id" => $user_id))->go();
    }

    function get_admins_by_userid($user_id){
        return $this->database->select(array("admin_id", "user_id", "display_name"))->from("admin_accounts")->where_and(array("user_id" => $user_id))->go();
    }

    function donors_donorid_userid($user_id, $donor_id){
        return $this->database->select(array("donor_id", "user_id"))->from("donor_accounts")->where_and(array("donor_id" => $donor_id, "user_id" => $user_id))->go();
    }

    function giftees_gifteeid_userid($user_id, $giftee_id){
        return $this->database->select(array("giftee_id", "user_id"))->from("giftee_accounts")->where_and(array("giftee_id" => $giftee_id, "user_id" => $user_id))->go();
    }

    function admins_adminid_userid($user_id, $admin_id){
        return $this->database->select(array("admin_id", "user_id"))->from("admin_accounts")->where_and(array("admin_id" => $admin_id, "user_id" => $user_id))->go();
    }

    function organizations_organizationid_userid($user_id, $organization_id){
        return $this->database->select(array("organization_id", "user_id"))->from("organization_owners")->where_and(array("organization_id" => $organization_id, "user_id" => $user_id))->go();
    }
}

?>