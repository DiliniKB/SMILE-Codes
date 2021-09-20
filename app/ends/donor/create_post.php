<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Something went wrong. Please contact us."
];

include "../../libs/functions.php";

$checks_base = array("keywords","town","district","title", "visibility");

if(check_isset($checks_base)){
    if(!in_array("", array("keywords","town","district","title", "visibility"))){
        $response["status"] = 0;
        $flag = true;
        $user_id = null;

        include "../../models/Database.php";
        include "../../models/Donor.php";

        $data["keywords"] = $_POST["keywords"];
        $data["town"] = $_POST["town"];
        $data["district"] = $_POST["district"];
        $data["title"] = $_POST["title"];
        $data["visibility"] = $_POST["visibility"];
        $data["type"] = "donor";
        $data["created_at"] = time();

        if(isset($_SESSION["user_id"]) && isset($_SESSION["role"])){
            $user_id = $_SESSION["user_id"];
            if($_SESSION["role"] != 'donor'){
                $flag = false;
                $response["message"] = "You logged in as a ".$_SESSION["role"].". this form is for donors";
            }
        }else{
            $flag = false;
            $response["message"] = "Please log in first.";
        }

        $donor_model = new Donor();
        
        if($flag){

            if(isset($_FILES["image"]['name'])){
                $filename = $_FILES['image']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $random_name = time().rand(1000,100000).".".$ext;
                $location = "../../../uploads/images/".$random_name;
                
                $done = move_uploaded_file($_FILES['image']['tmp_name'], $location);
                if ($done) { 
                    $data["image"] = $random_name;
                } else { 
                    $response["message"] = "Error occured while processing the image.";
                }
                  
            }

            $inserted = $donor_model->add_post($_SESSION["role_id"], $data);
            $response["error"] = 0;
            $response["message"] = "New post created";
        }
    }else{
        $response["message"] = "Please fill the required fields";
    }
}else{
    $response["message"] = "Invalid request: values not set";
}

echo json_encode($response);

?>