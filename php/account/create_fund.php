<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Something went wrong. Please contact us."
];

include "../../libs/functions.php";

$checks_base = array("amount","keywords","town","district","title","description","account_number", "bank_name","branch_name","account_holder", "type");

if(check_isset($checks_base)){
    if(!in_array("", array("amount","keywords","town","district","title","description", "type"))){
        $response["status"] = 0;
        $flag = true;
        $user_id = null;

        include "../../models/Database.php";
        include "../../models/Account.php";

        $data["amount"] = $_POST["amount"];
        $data["keywords"] = $_POST["keywords"];
        $data["town"] = $_POST["town"];
        $data["district"] = $_POST["district"];
        $data["title"] = $_POST["title"];
        $data["type"] = $_POST["type"];
        $data["description"] = $_POST["description"];
        $data["created_at"] = time();

        $data["account_number"] = $_POST["account_number"];
        $data["bank_name"] = $_POST["bank_name"];
        $data["branch_name"] = $_POST["branch_name"];
        $data["account_holder"] = $_POST["account_holder"];

        if(is_numeric($data["amount"])){
            $data["amount"] = (float)$data["amount"];
            if($data["amount"] < $config["min_fund_amount"]){
                $flag = false;
                $response["message"] = "Amount should be greater than Rs. ".$config["min_fund_amount"];
            }
        }else{
            $flag = false;
            $response["message"] = "Please enter a valid amount.";
        }

        if(isset($_SESSION["user_id"])){
            $user_id = $_SESSION["user_id"];
            $data["user_id"] = $user_id;
        }else{
            $flag = false;
            $response["message"] = "Please log in first.";
        }

        $account_model = new Account();
        
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


            $inserted = $account_model->add_fund($data);

            if($inserted){
                $response["error"] = 0;
                $response["message"] = "New fund added";
            }else{
                $response["message"] = "Something went wrong. please try again";
            }
        }
    }else{
        $response["message"] = "Please fill the required fields";
    }
}else{
    $response["message"] = "Invalid request: values not set";
}

echo json_encode($response);

?>