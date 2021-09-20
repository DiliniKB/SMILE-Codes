<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Something went wrong. Please contact us."
];

include "../../libs/functions.php";

function data_google_token($token){
    $url = "https://oauth2.googleapis.com/tokeninfo";
    $paras = [
        "id_token" => $token
    ];

    return json_decode(get_data_from_url($url,$paras),true);
}

function data_facebook_token($token){
    $url = "https://graph.facebook.com/me";
    $paras = [
        "access_token" => $token,
        "fields"=>"email,name,first_name,last_name"
    ];

    return json_decode(get_data_from_url($url,$paras),true);
}

$checks_base = array("first_name","last_name","email","password","nic","tp_num","dob", "email","google_token","facebook_token");

if(check_isset($checks_base)){
    if(!in_array("", array("nic","tp_num","dob"))){
        $response["status"] = 0;
        $flag = true;

        $email = $_POST["email"];
        $facebook_token = $_POST["facebook_token"];
        $google_token = $_POST["google_token"];

        $data["first_name"] = "";
        $data["last_name"] = "";
        $data["password"] = "";
        $data["email"] = "";

        $data["nic"] = $_POST["nic"];
        $data["tp"] = $_POST["tp_num"];
        $data["dob"] = $_POST["dob"];

        if(!empty($email)){
            $data["first_name"] = $_POST["first_name"];
            $data["last_name"] = $_POST["last_name"];
            $data["email"]= $_POST["email"];

            $options = [
                'cost' => 10,
            ];
            $data["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $flag = false;
                $response["message"] = "Invalid email";
            }

            if(strlen($data["password"]) < 8){
                $flag = false;
                $response["message"] = "Password is short";
            }

        }elseif(!empty($facebook_token)){
            $facebook_result = data_facebook_token($facebook_token);
            
            $data["first_name"] = $facebook_result["first_name"];
            $data["last_name"] = $facebook_result["last_name"];
            $data["email"]= $facebook_result["email"];
        }elseif(!empty($google_token)){
            $google_result = data_google_token($google_token);

            $data["first_name"] = $google_result["given_name"];
            $data["last_name"] = $google_result["family_name"];
            $data["email"]= $google_result["email"];
        }else{
            $flag = false;
            $response["message"] = "Invalid request";
        }

        if($flag){
            include "../../models/Database.php";
            include "../../models/Auth.php";
            include "../../models/Donor.php";
            $auth = new Auth();

            $result = $auth->check_exsisting_users($email, $data["nic"]);
            if(count($result) == 0){
                $new_user = $auth->insert_new_user($data);
                //print_r($new_user);
                if(count($new_user) == 1){
                    $_SESSION["user_id"] = $new_user[0]["user_id"];

                    $doner_model = new Donor();
                    
                    $donor["display_name"] = $data["first_name"]." ".$data["last_name"];
                    $donor["user_id"] = $_SESSION["user_id"];

                    $added_donor = $doner_model->insert_new_donor($donor);
                    if(count($added_donor) > 0){
                        $_SESSION["role"] = "donor";
                        $_SESSION["role_id"] = $added_donor[0]["donor_id"];

                        $response["error"] = 0;
                        $response["message"] = "Signing you up....";
                    }else{
                        $response["error"] = 1;
                        $response["message"] = "An unknown error occured. log in and create a donor account manually.";
                    }
                }else{
                    $response["error"] = 1;
                    $response["message"] = "Insertion error. Please try again";
                }
            }else{
                $response["error"] = 1;
                $response["message"] = "NIC or Email is already used. Try logging in";
            }
        }
    }else{
        $response["message"] = "Invalid request: empty values";
    }
}else{
    $response["message"] = "Invalid request: values not set";
}

echo json_encode($response);

?>