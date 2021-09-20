<?php

session_start();

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
    include "../../models/Donor.php";

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

    $result = $auth->get_data_by_email($email);
    if(count($result) == 1){

        if($method == "email"){

            if(password_verify($_POST["password"], $result[0]["password"])){
                $response["error"] = 0;
                $response["message"] = "Signing you up....";

                $_SESSION["user_id"] = $result[0]["user_id"];
            }else{
                $response["error"] = 1;
                $response["message"] = "Email or Password is incorrect.";
            }
        }else{
            $response["error"] = 0;
            $response["message"] = "Signing you up....";  
            
            $_SESSION["user_id"] = $result[0]["user_id"];
        }

        $doner_model = new Donor();
        $added_donor = $doner_model->get_donors_by_userid($_SESSION["user_id"]);
        if(count($added_donor) > 0){
            $_SESSION["role"] = "donor";
            $_SESSION["role_id"] = $added_donor[0]["donor_id"];
        }else{
            $_SESSION["role"] = "guest";
            $_SESSION["role_id"] = "-1";
        }
        
    }else{
        $response["error"] = 1;
        if($method == "email"){
            $response["message"] = "Email or Password is incorrect.";
        }else{
            $response["message"] = "Unable to find an account associated with your email. Try signing up";
        }
    }
}

echo json_encode($response);
?>