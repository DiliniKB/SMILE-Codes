<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Unknown error. Please contact us."
];

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) ){
    $user_id = $_SESSION["user_id"];

    if(isset($_POST["type"]) && isset($_POST["id"])){
        $role_type = $_POST["type"];
        $role_id = $_POST["id"];

        if(!empty($role_type) && !empty($role_id)){
            $response["status"] = 0;

            include "../../models/Database.php";
            include "../../models/Account.php";

            $account_model = new Account();

            $roles = [];

            switch($role_type){
                case "donor":
                    $roles = $account_model->donors_donorid_userid($user_id, $role_id);
                    break;
                case "giftee":
                    $roles = $account_model->giftees_gifteeid_userid($user_id, $role_id);
                    break;
                case "admin":
                    $roles = $account_model->admins_adminid_userid($user_id, $role_id);
                    break;
                case "organization":
                    $roles = $account_model->organizations_organizationid_userid($user_id, $role_id);
                    break;
                default:
                    break;
            }

            if(count($roles) == 1){
                $response["error"] = 0;
                $response["message"] = "Account is switched";

                $_SESSION["role"] = $role_type;
                $_SESSION["role_id"] = $role_id;
            }else{
                $response["error"] = 1;
                $response["message"] = "Something went wrong. please try again";
            }
        }
    }
}

echo json_encode($response);
?>