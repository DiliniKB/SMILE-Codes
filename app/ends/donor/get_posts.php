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
        $posts = $donor_model->get_posts();
        $response["error"] = 0;
        $response["message"] = $posts;
    }else{
        $response["message"] = "You have to be a donor to see posts";
    }
}

echo json_encode($response);

?>