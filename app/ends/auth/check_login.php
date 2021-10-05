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

    $auth = new Auth();

    $users = $auth->get_user_by_id($user_id);

    if(count($users) == 1){
        $response["message"] = array();
        $response["status"] = 0;
        $response["error"] = 0;

        $response["message"]["user"] = $users[0];
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