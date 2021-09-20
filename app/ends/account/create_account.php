<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Unknown error. Please contact us."
];

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) && isset($_GET["type"])){
    $response["status"] = 0;

    $user_id = $_SESSION["user_id"];
    $type = $_GET["type"];

    if(isset($_POST["first_name"]) && !empty($_POST["first_name"]) && isset($_POST["last_name"]) && !empty($_POST["last_name"])){
        include "../../models/Database.php";
        include "../../models/Account.php";

        $account_model = new Account();

        $data["display_name"] = $_POST["first_name"]." ".$_POST["last_name"];
        

        $inserted = false;

        switch($type){
            case "donor":
                $data["user_id"] = $user_id;
                $inserted = $account_model->insert_donor($data);
                break;
            case "giftee":
                $data["user_id"] = $user_id;
                $inserted = $account_model->insert_giftee($data);
                break;
            case "organization":
                if(isset($_POST["register_data"])){
                    $data["register_data"] = $_POST["register_data"];
                    $inserted = $account_model->insert_organization($data, $user_id);
                    $inserted = true;
                }
                break;
            default:
                $response["status"] = 1;
                $response["error"] = 1;
                $response["message"] = "System error. please contact us";
                break;
        }

        if($inserted){
            $response["error"] = 0;
            $response["message"] = "New account is created";
        }else{
            $response["error"] = 1;
            $response["message"] = "h Unknown error. please contact us";
        }
    }else{
        $response["error"] = 1;
        $response["message"] = "Please check your inputs again";
    }
}

echo json_encode($response);
?>