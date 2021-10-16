<?php

$sys_error = 0;
$sys_error_type = 'error';
$sys_error_msg = 'None';

$fname = "";
$lname = "";
$nic = "";
$dob = "";
$email = "";
$tpnum = "";

function merror($error, $type, $msg){
    global $sys_error, $sys_error_msg, $sys_error_type;

    $sys_error = $error;
    $sys_error_type = $type;
    $sys_error_msg = $msg;
}

function check_isset($keys){
    foreach($keys as $key){
        if(!isset($_POST[$key]) || empty($_POST[$key])){
            return false;
        }
    }

    return true;
}

function password_check(){
    if(strlen($_POST['password']) < 8){
        merror(1, 'error', 'Password is short');
        return false;
    }

    if($_POST['password'] != $_POST['password_confirm']){
        merror(1, 'error', 'Passwords doesnt match');
        return false;
    }
    return true;
}

function phone_check(){
    $regexp = '/^0\d{9}$/';
    if(!preg_match($regexp, $_POST['tpnum'])){
        merror(1, 'error', 'Invalid phone number');
        return false;
    }
    return true;
}

function dob_check(){
    $date = new DateTime($_POST['dob']);
    $now = new DateTime();
    $interval = $now->diff($date);
    if($interval->y < 18){
        merror(1, 'error', 'You should be older than 18');
        return false;
    }
    return true;
}

function nic_check(){
    $nic_string =  strtolower($_POST['NIC']);
    $dob = new DateTime($_POST['dob']);
    $flag = true;

    switch(strlen($nic_string)){
        case 10:
            if(substr($nic_string,0,2) != substr($dob->format("Y"),2,2)){
                $flag = false;
            }
            $re1 = '/^\d{9}[x|v]$/';
            if(!preg_match($re1, $nic_string)){
                $flag = false;
            }
            break;
        case 12:
            if(substr($nic_string,0,4) != $dob->format("Y")){
                $flag = false;
            }
            $re2 = '/^\d{12}$/';
            if(!preg_match($re2, $nic_string)){
                $flag = false;
            }
            break;
        default:
            $flag= false;
            break;
    }

    if(!$flag){
        merror(1, 'error', 'Please check you NIC and DOB again');
    }

    return $flag;
}

if(isset($_POST['signup'])){
    $checks = ['fname', 'lname', 'NIC', 'dob', 'email', 'tpnum', 'password', 'password_confirm'];
    if(check_isset($checks)){
        $flag = true;

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['NIC'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $tpnum = $_POST['tpnum'];

        if(!password_check() || !phone_check() || !dob_check() || !nic_check()){
            $flag = false;
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $flag = false;
            merror(1, 'error', 'Invalid email address');
        }

        if($flag){
            $pdo = new PDO(
                "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                DB_USERNAME, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

            $query = "INSERT INTO registered_user (first_name, last_name, password, email_address, DOB, NIC, fundCount, postCount, donateCount, removed_count, donateAmount, balance, account_number, branch_name, bank_name, picture, address, contact_no) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $values = [$_POST['fname'], $_POST['lname'], $_POST['password'], $_POST['email'], $_POST['dob'], $_POST['NIC'], 0, 0, 0, 0, 0,0, "", "", "", 0, "", $_POST['tpnum']];

            $stmt = $pdo->prepare($query);
            $stmt->execute($values);
            $id = $pdo->lastInsertId();
            if($id){
                $_SESSION['username'] =$_POST['email'];
                $_SESSION['fname'] = $_POST['fname'];
                header('Location:'."FundWall.php?cat='Medical'");
            }else{
                merror(1, 'error', 'Something went wrong');
            }
        }
    }else{
        merror(1, 'error', 'Please fill all the fields');
    }
}

?>