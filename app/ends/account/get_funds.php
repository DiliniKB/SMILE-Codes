<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Unknown error. Please contact us."
];

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) ){
    $response["status"] = 0;

    $user_id = $_SESSION["user_id"];

    include "../../models/Database.php";
    include "../../models/Account.php";

    $account_model = new Account();

    $funds = $account_model->get_funds();
    $response["error"] = 0;
    $response["message"] = $funds;
}

echo json_encode($response);

?>