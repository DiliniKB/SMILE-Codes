<?php
session_start();

$sys_error = 0;
$sys_error_type = "error";
$sys_error_msg = "none";

include "functions/functions.php";

$email = "";

function redirect_path(){
    if(isset($_GET['continue'])){
        header("location: ".$_GET['continue']);
    }else{
        header("location: dashboard.php");
    }
}

if(isset($_POST["login_done"])){
    include "models/Database.php";
    include "models/Auth.php";

    $auth = new Auth();
    
    $email = $_POST["email"];

    $result = $auth->get_data_by_email($email);
    if(count($result) == 1){
        if(password_verify($_POST["password"], $result[0]["password"])){
            $_SESSION["user_id"] = $result[0]["user_id"];
            redirect_path();
        }else{
            $sys_error = 1;
            $sys_error_msg = "Email or Password is incorrect.";
        }
        
    }else{
        $sys_error = 1;
        $sys_error_msg = "Email or Password is incorrect.";
    }
}
?>