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
    include "../../models/Donor.php";

    $donor_model = new Donor();

    if($_SESSION["role"] == "donor"){
        $funds = $donor_model->get_funds();
        $response["error"] = 0;
        $response["message"] = $funds;
    }else{
        $response["message"] = "You have to be a donor to see funds";
    }
}

echo json_encode($response);

?>