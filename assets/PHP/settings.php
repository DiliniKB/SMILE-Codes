<?php

$sys_error = 0;
$sys_error_type = 'error';
$sys_error_msg = 'None';

function merror($error, $type, $msg){
    global $sys_error, $sys_error_msg, $sys_error_type;

    $sys_error = $error;
    $sys_error_type = $type;
    $sys_error_msg = $msg;
}

$pdo = new PDO(
    "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=".DB_CHARSET,
    DB_USERNAME, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

$query = "SELECT * FROM registered_user WHERE email_address=?";
$values = [$_SESSION['username']];

$stmt = $pdo->prepare($query);
$stmt->execute($values);
$results = $stmt->fetchAll();
$r = $results[0];

$email = $r["email_address"];
$bank_name = $r["bank_name"];
$bank_branch = $r["branch_name"];
$bank_account = $r["account_number"];

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

if(isset($_POST['submit_email'])){
    if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        
        $query = "SELECT * FROM registered_user WHERE email_address=?";
        $values = [$_SESSION['username']];

        $stmt = $pdo->prepare($query);
        $stmt->execute($values);
        $rows = $stmt->fetchAll();

        $r = $rows[0];

        if(password_verify($_POST['password'], $r['password'])){
            $query = "UPDATE registered_user SET email_address=? WHERE email_address=?";
            $values = [$_POST['email'], $_SESSION['username']];

            $stmt = $pdo->prepare($query);
            $stmt->execute($values);

            $_SESSION['username'] = $_POST['email'];

            merror(1, 'success', 'Email is changed');
        }else{
            merror(1, 'error', 'Incorrect password');
        }
    }
}

if(isset($_POST['submit_password'])){
    if(isset($_POST['password']) && isset($_POST['password_confirm']) && password_check()){
        
        $options = [
            'cost' => 10,
        ];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
        
        $query = "UPDATE registered_user SET password=? WHERE email_address=?";
        $values = [$password, $_SESSION['username'], ];

        $stmt = $pdo->prepare($query);
        $stmt->execute($values);

        merror(1, 'success', 'Password is changed');
    }
}

if(isset($_POST['submit_bank_remove'])){
    $query = "UPDATE registered_user SET bank_name=?, branch_name=?, account_number=? WHERE email_address=?";
    $values = ["","","", $_SESSION['username']];

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);

    $bank_name = "";
    $bank_branch = "";
    $bank_account = "";

    merror(1, 'success', 'Bank account is removed');
}

if(isset($_POST['submit_bank'])){
    if(isset($_POST['bank_name']) && isset($_POST['branch']) && isset($_POST['acc_number'])){
        $bank_name = $_POST['bank_name'];
        $bank_branch = $_POST['branch'];
        $bank_account = $_POST['acc_number'];

        if(!empty($bank_name) && !empty($bank_branch) && !empty($bank_account)){
            $query = "UPDATE registered_user SET bank_name=?, branch_name=?, account_number=? WHERE email_address=?";
            $values = [$_POST['bank_name'],$_POST['branch'],$_POST['acc_number'], $_SESSION['username']];

            $stmt = $pdo->prepare($query);
            $stmt->execute($values);

            merror(1, 'success', 'Bank account is changed');
        }else{
            merror(1, 'error', 'Please fill all the fields');
        }
    }
}

?>