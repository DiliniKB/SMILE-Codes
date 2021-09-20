<?php

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Server error. Please contact us."
];

include "../../libs/functions.php";

function email_google_token($token){
    $url = "https://oauth2.googleapis.com/tokeninfo";
    $paras = [
        "id_token" => $token
    ];

    $result = json_decode(get_data_from_url($url,$paras),true);
    return $result["email"];
}

function email_facebook_token($token){
    $url = "https://graph.facebook.com/me";
    $paras = [
        "access_token" => $token,
        "fields"=>"email,name,first_name,last_name"
    ];

    $result = json_decode(get_data_from_url($url,$paras),true);
    return $result["email"];
}

if(isset($_GET["method"])){
    $response["status"] = 0;

    $method = $_GET["method"];
    include "../../models/Database.php";
    include "../../models/Auth.php";

    $auth = new Auth();

    $email = "";
    
    switch($method){
        case "email":
            $email = $_POST["email"];
            break;
        case "google":
            $email = email_google_token($_POST["google_token"]);
            break;
        case "facebook":
            $email = email_facebook_token($_POST["facebook_token"]);
            break;
    }

    $result = $auth->get_users_by_email($email);
    if(count($result) == 0){
        $response["error"] = 0;
        $response["message"] = "Success";
    }else{
        $response["error"] = 1;
        $response["message"] = "Email is already exists. Try logging in";
    }
}

echo json_encode($response);

?>