<?php
session_start();

$sys_error = 0;
$sys_error_type = "error";
$sys_error_msg = "none";

include "functions/functions.php";

function redirect_path(){
    if(isset($_GET['continue'])){
        header("location: ".$_GET['continue']);
    }else{
        header("location: dashboard.php");
    }
}

$data["first_name"] = "";
$data["last_name"] = "";
$data["password"] = "";
$data["email"] = "";

$data["nic"] = "";
$data["tp"] = "";
$data["dob"] = "";

$checks_base = array("first_name","last_name","email","password","nic","tp_num","dob", "email");

if(isset($_POST['signup_done'])){
    if(check_isset($checks_base)){
        if(!in_array("", array("nic","tp_num","dob", "first_name", "last_name", "email"))){
            $flag = true;
            $email = $_POST["email"];

            $data["nic"] = $_POST["nic"];
            $data["tp"] = $_POST["tp_num"];
            $data["dob"] = $_POST["dob"];

            
            $data["first_name"] = $_POST["first_name"];
            $data["last_name"] = $_POST["last_name"];
            $data["email"]= $_POST["email"];


            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $flag = false;
                $sys_error = 1;
                $sys_error_msg = "Invalid email";
            }

            if(strlen($_POST["password"]) < 8){
                $flag = false;
                $sys_error = 1;
                $sys_error_msg = "Password is short";
            }

            $options = [
                'cost' => 10,
            ];
            $data["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

            if($flag){
                include "models/Database.php";
                include "models/Auth.php";
                $auth = new Auth();

                $result = $auth->check_exsisting_users($email, $data["nic"]);
                if(count($result) == 0){
                    $new_user = $auth->insert_new_user($data);
                    if(count($new_user) == 1){
                        $_SESSION["user_id"] = $new_user[0]["user_id"];

                        redirect_path();
                    }else{
                        $sys_error = 1;
                        $sys_error_msg = "Insertion error. Please try again";
                    }
                }else{
                    $sys_error = 1;
                    $sys_error_msg = "NIC or Email is already used. Try logging in";
                }
            }
        }else{
            $sys_error = 1;
            $sys_error_msg = "Please fill the required fields.";
        }
    }
}
?>