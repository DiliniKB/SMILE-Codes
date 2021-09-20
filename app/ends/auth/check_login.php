<?php

session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Unknown error. Please contact us."
];

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){

    $user_id = $_SESSION["user_id"];

    include "../../models/Database.php";
    include "../../models/Auth.php";
    include "../../models/Account.php";

    $auth = new Auth();
    $account_model = new Account();

    $users = $auth->get_user_by_id($user_id);

    if(count($users) == 1){
        $response["message"] = array();

        $response["message"]["user"] = $users[0];

        $role = null;

        switch($_SESSION["role"]){
            case "guest":
                $response["message"]["role"]["type"] = "Guest";
                $role= array("display_name" => "Guest user");
                break;
            case "donor":
                $response["message"]["role"]["type"] = "Donor";
                $role = $account_model->get_donors_by_donorid($_SESSION["role_id"]);
                break;
            case "giftee":
                $response["message"]["role"]["type"] = "Giftee";
                $role = $account_model->get_giftees_by_gifteeid($_SESSION["role_id"]);
                break;
            case "organization":
                $response["message"]["role"]["type"] = "Organization";
                $role = $account_model->get_organizations_by_organizationid($_SESSION["role_id"]);
                break;
            case "admin":
                $response["message"]["role"]["type"] = "Admin";
                $role = $account_model->get_admins_by_adminid($_SESSION["role_id"]);
                break;
            default:
                $role = array();
                break;
        }

        if(count($role) == 1){
            $response["status"] = 0;
            $response["error"] = 0;

            $response["message"]["role"]["display_name"] = $role[0]["display_name"];
            $response["message"]["role"]["link"] = $config["base_url"]."/".$_SESSION["role"]."/dashboard.html";
            $response["message"]["role"]["id"] = $_SESSION["role_id"];
        }else{
            $response["status"] = 1;
            $response["error"] = 1;
            $response["message"] = "System error. Please contact us";
        }
    }else{
        $response["status"] = 1;
        $response["error"] = 1;
        $response["message"] = "System error. Please contact us";
    }
}else{
    $response["status"] = 0;
    $response["error"] = 1;
    $response["message"] = "Please log in first";
}

echo json_encode($response);

?>